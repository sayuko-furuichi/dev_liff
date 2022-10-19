<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class Reserves extends Controller
{
    private $storeId;
    private $user_id;

    function __construct(Request $request){
        $this->storeId =$request->store;
}
    //全部getして、最後予約の段階でPOSTして保存はどう？
    function menu(Request $request){

        return view('reserves.menu',[
            'request'=>$request
        ]);
    }
    function date(Request $request){
        return view('reserves.dateTime',[
            'request'=>$request
        ]);
       
    }
    function confirm(Request $request){
      
        return view('reserves.confirm',[
            'request'=>$request
        ]);
        
       
    }
    function send(Request $request){
        $creditForm=0;
        if($request->pay=='kureka'){
            $creditForm=1;
        }
        return view('reserves.sendClient',[
            'request'=>$request,
            'credit'=>$creditForm
        ]);
    }
    function submit(Request $request){
        $request->store;
        $request->dateTime;
        $request->courses[0];
        $request->sei;
        $request->mei;
        $request->FSei;
        $request->FMei;
        $request->tel;
        $request->credit_token;

        $header = array(
            'Authorization: Bearer sk_test_c62fade9d045b54cd76d7036:',
        );

        //クエリでくっつけてよいらしい
        $param =[
            'amount'=>2980,
            'currency' => 'jpy',
            'card' => $request->credit_token

        ];
        //配列をHTTPクエリパラメータにしてくれる！
        $param=http_build_query($param, "", "&");


        $context = stream_context_create([
            'http' => [
                'ignore_errors' => true,
                'method' => 'GET',
                'header' => implode("\r\n", $header),
                'content' => $param,
            ],
        ]);

        $response = file_get_contents('https://api.pay.jp/v1/charges', false, $context);
        if (strpos($http_response_header[0], '200') === false) {
            error_log('Request failed: ' . $response);
        }


        return view('reserves.submit',[
            'response'=>$reponse
        ]);
    }
}
