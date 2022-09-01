<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEvents extends Controller
{
    //
    public function index()
    {
        return view('send.sendevent');
    }

 public function send(Request $request)
 {
     //headerに、署名を作成する

     // $detail=$request->msg;

     $mid= str_pad(random_int(0, 99999999), 20, 0, STR_PAD_LEFT);

     //TODO:後でiniにも追加する
     date_default_timezone_set('Asia/Tokyo');

     $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
     $rand_str = substr(str_shuffle($str), 0, 16);

     //requestbodyをハッシュ化して、署名とする

     //replytokenが効いてない！
     $detail=([

        'destination'=> 'Uffd4dd52c580e1d2bb7b0a66e0ef1951',
        'events'=> [
          [
            'type'=> 'message',
            'message'=> [
              'type'=> 'text',
              'id'=> $mid,
              'text'=>  $request->msg,
              'text2'=>  $request->msg2


          ],
            'timestamp'=> $_SERVER['REQUEST_TIME'],
            'source'=> [
              'type'=> 'web',
              'userId'=> $request->id,
            ],
            'replyToken'=> $rand_str,
            'mode'=> 'active',
       //     'webhookEventId'=> $rand_str,
            'deliveryContext'=> [
              'isRedelivery'=> false
            ]
          ],

        ]
      ]);

     $header = array(
         'Content-Type: application/json',
       'x_demo_signature: demo',
     );

     //試しに、create richmenuにする
     $context = stream_context_create([
         'http' => [
             'ignore_errors' => true,
             'method' => 'POST',
             'header' => implode("\r\n", $header),
             'content' => json_encode($detail, true)
         ],
     ]);
     //   var_dump($detail);

     $rmresponse = file_get_contents('https://dev-bot0722.herokuapp.com/public/api/callback?store_id=1', false, $context);
     var_dump($rmresponse);
     if (strpos($http_response_header[0], '200') === false) {
         $rmresponse = 'false';
     }
     return redirect('/send');


     //デバッグ用
        //  return view('send.sendevent', [
        //   'rtn' =>$rmresponse
        //   ]) ;

    //     var_dump($rmresponse);
 }
public function Coupons()
{
}
}
