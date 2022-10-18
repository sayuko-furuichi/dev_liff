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
       $old= Client::where('line_user_id',$request->userId)->where('store_id',$request->store_id)->first('id');
        if(isset($old->id)){
            return redirect('/addMember')->with('result', 'あなたはすでに会員です');
        }else{
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
            $detail=([
                        'events'=> [
                          [
                            'type'=> 'message',
                            'message'=> [
                              'type'=> 'message',
                              'text'=>  '完了',
                              //text2 に line_user_idをつける
                              'userId'=>  $request->userId,
                              
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
            $lineStore =lineStoreStatus::where('store_id',$request->store_id)->first('channel_secret');
            
            
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
            $res=  file_get_contents('https://dev1.softnext.co.jp/syokusapo/linebot/public/api/callback?store_id='.$request->store_id, false, $context);
            
    
    
    
            return redirect('/addMember')->with('result', '登録が完了しました！');
        }
    
    }

    public function myPage()
    {
        return view('members.mypage');
    }
}
