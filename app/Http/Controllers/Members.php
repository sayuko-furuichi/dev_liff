<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Prefecture;

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
            $nwClient->building_name ='';
            $nwClient->store_id = $request->store_id;
            $nwClient->c_corporate_number=0;
            $nwClient->c_corporate_name='';
            $nwClient->referral_number =0;
    
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
            #commons風アカウントのCS
            $channelSecret='13f11d33dc43547197bbb91b9b712674';
            
            $encode=json_encode($detail);
            
            $hash = hash_hmac('sha256', $encode, $channelSecret, true);
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
