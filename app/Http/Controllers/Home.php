<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class Home extends Controller
{
    //
    public function index(Request $request)
    {
        if(($request->route && $request->store) !=null ){
          //  return view('inflowRoute.getInflowRoute',['requests'=>$request]);
          
          $param =[
            'grant_type'=>'authorization_code',
            'client_id' => '1657487333-JPeEg6lr',
            'client_secret' => '5d2a8de0e8517e5b5cd5d6af2d23116f',
            'code'=>$request->code,
        ];
        //配列をHTTPクエリパラメータにしてくれる！
        $param=http_build_query($param, "", "&");

        $header = array(
            'Content-Type: application/x-www-form-urlencoded',
        );
        $context = stream_context_create([
            'http' => [
                'ignore_errors' => true,
                'method' => 'POST',
                'header' => $header,
               'content' => $param,
            ],
        ]);

        $res=file_get_contents('https://api.line.me/v2/oauth/accessToken', false, $context);
        if (strpos($http_response_header[0], '200') === false) {
            $res='request failed';
        }

          
          $store = Store::where('id',$request->store)->first();
          
         return redirect($store->account_url);
        }
        return view('entrance');
    }
}
