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

        //Authorization　に、秘密鍵を渡す
        // $pass =base64_encode('tribe0819');
        // $header = array(
        //     'Authorization: Basic sk_test_e7c71bc57ca67b1092849ac7:',  
        //      'Content-type: application/x-www-form-urlencoded'
        // );

        // //クエリでくっつけてよいらしい
        $param =[
            'amount'=>2980,
            'currency' => 'jpy',
            'card' => $request->credit_token,
            // 'capture'=>'true'

        ];
        //配列をHTTPクエリパラメータにしてくれる！
         $param=http_build_query($param, "", "&");


        // $context = stream_context_create([
        //     'http' => [
        //         'ignore_errors' => true,
        //         'method' => 'POST',
        //         'header' => implode("\r\n", $header),
        //         'content' => $param,
        //     ],
        // ]);

      
        // $response = file_get_contents('https://api.pay.jp/v1/charges', false, $context);
        // if (strpos($http_response_header[0], '200') === false) {
        //     error_log('Request failed: ' . $response);
        // }


        $api_url ='https://api.pay.jp/v1/charges';

        //エンコードされたURLでPOST通信する
        $headers = ["Authorization: Basic sk_test_e7c71bc57ca67b1092849ac7:"];
    
        $curl_handle = curl_init();
    
        curl_setopt($curl_handle, CURLOPT_POST, true);
        // curl_setopt($curl_handle, CURLOPT_HTTPGET, true);
        curl_setopt($curl_handle, CURLOPT_URL, $api_url);
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS,$param);
        // curl_exec()の結果を文字列にする
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        //実行
        $res = curl_exec($curl_handle);
    
        //close
        curl_close($curl_handle);
    
     dd($param);




        return view('reserves.submit',[
            'response'=>$response
        ]);
    }
}
