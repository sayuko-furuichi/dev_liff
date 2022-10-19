<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Prefecture;
use App\Models\LineStoreStatus;

class Members extends Controller
{
    //
    public function index(Request $request)
    {
        $prefectutes= Prefecture::all();

        return view('members.addMember', ['prefecture'=>$prefectutes ,'store_id'=>$request->store]);
    }

    public function add(Request $request)
    {
        $old= Client::where('line_user_id', $request->userId)->where('store_id', $request->store_id)->first();
        if (!isset($old->id)) {
          $nwClient = new Client();
          $nwClient->line_user_id = $request->userId;
          $nwClient->first_name = $request->mei;
          $nwClient->last_name = $request->sei;
          $nwClient->mei = $request->fMei;
          $nwClient->sei = $request->fSei;
          $nwClient->phone_number = $request->tel;
          $nwClient->prefecture_id = $request->prefecture_id;
          $nwClient->email = $request->email;
          $nwClient->municipality = $request->municipality;
          $nwClient->house_number = $request->house_number;
          $nwClient->line_user_id = $request->userId;
          $nwClient->store_id = $request->store_id;

          $nwClient->building_name ='';
          $nwClient->c_corporate_number=0;
          $nwClient->c_corporate_name='';
          $nwClient->referral_number =0;
          $nwClient->c_corporate_name='';

          //1018 追加
          $nwClient->gender_id= 4;
          $nwClient->cellular_phone= '';
          $nwClient->sns1= '';
          $nwClient->sns2= '';
          $nwClient->sns3= '';
          $nwClient->job= '';
          $nwClient->allergy= '';
          $nwClient->note= '';
          $nwClient->business_card_id= 0;
          $nwClient->number_of_visit= 0;
          $nwClient->amount_of_payment= 0;
          $nwClient->average_payment_amount= 0;
          $nwClient->zip= '';

          //ランク会員に設定する
          $nwClient->member_attribute_id=2;


          $nwClient->save();

          //JSONでBotにpostする

          //requestBody 後でjson_encodeします

        $this->sendToBot($request->userId,$request->store_id);

          return redirect('/addMember')->with('result', '登録が完了しました！');
         
        } elseif ($old->member_attribute_id==1) {
            $old->line_user_id = $request->userId;
            $old->first_name = $request->mei;
            $old->last_name = $request->sei;
            $old->mei = $request->fMei;
            $old->sei = $request->fSei;
            $old->phone_number = $request->tel;
            $old->prefecture_id = $request->prefecture_id;
            $old->email = $request->email;
            $old->municipality = $request->municipality;
            $old->house_number = $request->house_number;
            $old->line_user_id = $request->userId;
            $old->store_id = $request->store_id;

            $old->building_name ='';
            $old->c_corporate_number=0;
            $old->c_corporate_name='';
            $old->referral_number =0;
            $old->c_corporate_name='';

            //1018 追加
            $old->gender_id= 4;
            $old->cellular_phone= '';
            $old->sns1= '';
            $old->sns2= '';
            $old->sns3= '';
            $old->job= '';
            $old->allergy= '';
            $old->note= '';
            $old->business_card_id= 0;
            $old->number_of_visit= 0;
            $old->amount_of_payment= 0;
            $old->average_payment_amount= 0;
            $old->zip= '';

            //ランク会員に変更する
            $old->member_attribute_id=2;


            $old->save();

            $this->sendToBot($request->userId,$request->store_id);
            return redirect('/addMember')->with('result', '再登録が完了しました！');

        } else {
          return redirect('/addMember')->with('result', 'あなたはすでに会員です');
        }
    }

    public function sendToBot($userId,$storeId)
    {
        $detail=([
          'events'=> [
            [
              'type'=> 'message',
              'message'=> [
                'type'=> 'message',
                'text'=>  '完了',
                //text2 に line_user_idをつける
                'userId'=>  $userId,

            ],
              'timestamp'=> $_SERVER['REQUEST_TIME'],
              'source'=> [
                'type'=> 'web',
              ],
              'mode'=> 'active',
              'deliveryContext'=> [
                'isRedelivery'=> false
              ]
            ],

          ]
        ]);

        //チャネルアクセストークンを秘密鍵として、requestBodyをハッシュ化する
        #アカウントのCSを取得する
        $lineStore =lineStoreStatus::where('store_id', $storeId)->first('channel_secret');


        $encode=json_encode($detail);

        $hash = hash_hmac('sha256', $encode, $lineStore->channel_secret, true);
        $signature = base64_encode($hash);

        //ハッシュ化したものを[x_demo_signature]としてheaderにつける
        $header = array(
        'Content-Type: application/json',
        'x_demo_signature:'. $signature,
        );

        //JSON形式でPOST送信する
        $context = stream_context_create([
        'http' => [
            'ignore_errors' => true,
            'method' => 'POST',
            'header' => implode("\r\n", $header),
            'content' => $encode
        ],
        ]);

        //Botが起動するURLへPostする。 store_idをクエリで付けてください
        $res=  file_get_contents('https://dev1.softnext.co.jp/syokusapo/linebot/public/api/callback?store_id='.$storeId, false, $context);
        return $res;
    }


    public function myPage(Request $request)
    {
      $member=Client::where('store_id',$request->store) ;
        return view('members.mypage');
    }
}
