<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\ClientCharge;

class Reserves extends Controller
{
    private $storeId;
    private $user_id;

    public function __construct(Request $request)
    {
        $this->storeId =$request->store;
    }
    //全部getして、最後予約の段階でPOSTして保存はどう？
    public function menu(Request $request)
    {
        return view('reserves.menu', [
            'request'=>$request
        ]);
    }
    public function date(Request $request)
    {
        return view('reserves.dateTime', [
            'request'=>$request
        ]);
    }
    public function confirm(Request $request)
    {
        return view('reserves.confirm', [
            'request'=>$request
        ]);
    }
    public function send(Request $request)
    {
        $creditForm=0;
        if ($request->pay=='kureka') {
            $creditForm=1;
        }
        return view('reserves.sendClient', [
            'request'=>$request,
            'credit'=>$creditForm
        ]);
    }



    public function submit(Request $request)
    {
        //予約に入れる

        if (isset($request->credit_token)) {
            $charges= $this->createCharge($request);


            return view('reserves.submit', [
                'response'=>$charges['message'],
                'charge'=> $charges['charge'],
                'store'=>$request->store
            ]);
        } else {
            return view('reserves.submit');
        }
    }


public function createCharge($request)
{
    //POSTする内容を連想配列にまとめる
    $param =[
      'amount'=>2980,
      'currency' => 'jpy',
      'card' => $request->credit_token,
      'capture'=>'true'

    ];
    //配列を hoge=hoge& のHTTPクエリパラメータにする
    $param=http_build_query($param, "", "&");


    $api_url ='https://api.pay.jp/v1/charges';

    //headerをsetする。authoriは付けない。POSTするので指定のtypeで
    $headers = array('Content-type: application/x-www-form-urlencoded');


    $curl_handle = curl_init();

    //POST送信する
    curl_setopt($curl_handle, CURLOPT_POST, true);
    curl_setopt($curl_handle, CURLOPT_URL, $api_url);
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $param);
    // curl_exec()の結果を文字列にする
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    //オプションとして、ユーザ名:パスワードを付ける
    curl_setopt($curl_handle, CURLOPT_USERPWD, 'sk_test_e7c71bc57ca67b1092849ac7:');
    //実行
    $res = curl_exec($curl_handle);

    //close
    curl_close($curl_handle);

    $charge=json_decode($res, true);

    if (strpos(curl_getinfo($curl_handle, CURLINFO_RESPONSE_CODE), '200') === false) {
        $message= '決済に失敗しました　';
    } elseif (($charge['failure_message']) != '') {
        $message= "決済に失敗しました\n
         エラーコード:".$charge['failure_code'].
         "\nエラー：".$charge['failure_message'];
    } else {
        $message='決済が完了しました！';



        //支払の登録
        $cardOb=$charge['card'];

        $nwCharge =new ClientCharge();
        $nwCharge->amount= $charge['amount'];

        $nwCharge->store_id= $request->store;
        $nwCharge->line_user_id= $request->userId;

        //3項演算子で、NULLだった場合は空文字代入する
        $nwCharge->reserve_id= 0;
        $nwCharge->expired_at= $charge['expired_at']==null ? null : date('Y-m-d H:i:s', $charge['expired_at']);
        $nwCharge->captured_at= $charge['captured_at']==null ? null : date('Y-m-d H:i:s', $charge['captured_at']);
        $nwCharge->customer_id= $cardOb['customer']==null ? '' : $cardOb['customer'];
        $nwCharge->description= $charge['description']==null ? '' : $charge['description'];

        $nwCharge->refunded= $charge['refunded']==null ? 0 : $charge['refunded'];
        $nwCharge->amount_refunded= $charge['amount_refunded']==null ? 0 : $charge['amount_refunded'];
        $nwCharge->refund_reason= $charge['refund_reason']==null ? '' : $charge['refund_reason'];
        $nwCharge->fee_rate= $charge['fee_rate']==null ? '' : $charge['fee_rate'];
        $nwCharge->failure_message= $charge['failure_message']==null ? '' : $charge['failure_message'];

        $nwCharge->charge_id= $charge['id']==null ? '' : $charge['id'];
        $nwCharge->captured= $charge['captured']==null ? 0 : $charge['captured'];
        $nwCharge->holder_name= $cardOb['name']==null ? 0 : $cardOb['name'];

        $nwCharge->save();

        return  ['charge'=>$charge,'message'=>$message];
    }
}


    public function cancel(Request $request)
    {
        $request->charge_id;

        $param =[
            'amount'=>2980,
            'refund_reason' => '予約キャンセルの為'

          ];
        //配列を hoge=hoge& のHTTPクエリパラメータにする
        $param = http_build_query($param, "", "&");


        $api_url ='https://api.pay.jp/v1/charges/'. $request->charge_id.'/refund';

        //headerをsetする。authoriは付けない。POSTするので指定のtypeで
        $headers = array('Content-type: application/x-www-form-urlencoded');


        $curl_handle = curl_init();

        //POST送信する
        curl_setopt($curl_handle, CURLOPT_POST, true);
        curl_setopt($curl_handle, CURLOPT_URL, $api_url);
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $param);
        // curl_exec()の結果を文字列にする
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        //オプションとして、ユーザ名:パスワードを付ける
        curl_setopt($curl_handle, CURLOPT_USERPWD, 'sk_test_e7c71bc57ca67b1092849ac7:');
        //実行
        $res = curl_exec($curl_handle);

        //close
        curl_close($curl_handle);

        $charge=json_decode($res, true);


        //DBへのInsert
        $cardOb=$charge['card'];

        $nwCharge =new ClientCharge();
        $nwCharge->amount= $charge['amount'];

        $nwCharge->store_id= $request->store;
        $nwCharge->line_user_id= $request->userId;

        //3項演算子で、NULLだった場合は空文字代入する
        $nwCharge->reserve_id= 0;
        $nwCharge->expired_at= $charge['expired_at']==null ? null : date('Y-m-d H:i:s', $charge['expired_at']);
        $nwCharge->captured_at= $charge['captured_at']==null ? null : date('Y-m-d H:i:s', $charge['captured_at']);
        $nwCharge->customer_id= $cardOb['customer']==null ? '' : $cardOb['customer'];
        $nwCharge->description= $charge['description']==null ? '' : $charge['description'];

        $nwCharge->refunded= $charge['refunded']==null ? 0 : $charge['refunded'];
        $nwCharge->amount_refunded= $charge['amount_refunded']==null ? 0 : $charge['amount_refunded'];
        $nwCharge->refund_reason= $charge['refund_reason']==null ? '' : $charge['refund_reason'];
        $nwCharge->fee_rate= $charge['fee_rate']==null ? '' : $charge['fee_rate'];
        $nwCharge->failure_message= $charge['failure_message']==null ? '' : $charge['failure_message'];

        $nwCharge->charge_id= $charge['id']==null ? '' : $charge['id'];
        $nwCharge->captured= $charge['captured']==null ? 0 : $charge['captured'];
        $nwCharge->holder_name= $cardOb['name']==null ? 0 : $cardOb['name'];

        $nwCharge->save();

        $message ="キャンセルを受け付けました。
                   \nお支払い金額:" .$charge['amount'].
                  "円\n返金額:".$charge['amount_refunded'].'円';

        return view('reserves.submit', [
            'response'=>$message,
            'store'=>$request->store
        
        ]);
    }
}
