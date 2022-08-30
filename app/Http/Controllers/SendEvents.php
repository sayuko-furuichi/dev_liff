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
     $request;
     //headerに、署名を作成する

   // $detail=$request->msg;

 //   $mid= str_pad(random_int(0,99999999),20,0, STR_PAD_LEFT);
     $detail=([
        'destination'=> $request->uid,
        'events'=> [
          [
            'type'=> 'message',
            'message'=> [
              'type'=> 'text',
   //           'id'=> '143537989211166465413215365341351',
              'text'=>  $request->msg
            ],
            'timestamp'=> 1625665242211,
            'source'=> [
              'type'=> 'user',
              'userId'=> $request->uid,
            ],
            'replyToken'=> '757913772c4646b784d4b7ce46d12671awgaergethsdt',
            'mode'=> 'active',
            'webhookEventId'=> '01FZ74A0TDDPYRVKNK77XKC3ZUGDWMWOD?JLDWKR',
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

     $rmresponse = file_get_contents('https://dev-bot0722.herokuapp.com/public/api/callback?store_id=3', false, $context);
 
     if (strpos($http_response_header[0], '200') === false) {
         $rmresponse = 'false';
     }
     return view('send.sendevent', [
         'rtn' =>$rmresponse
         ]) ;

 }
}
