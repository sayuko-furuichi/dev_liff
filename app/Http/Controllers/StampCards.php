<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StampCard;

class StampCards extends Controller
{
    public function login(Request $request)
    {
        return view('stampCards.login', ['storeId'=>$request->store]);
        //カードの作成から
        //liff.init()後にuserIDが取得できるので、その時にカード取得判定が出来る
        //  $request->userId ='debug';
        //  return view('stampCards.stampCard',['userId'=>$request->userId]);
    }

    //
    public function index(Request $request)
    {
        //UserIdとstore_idをrequestに保持している状態
        //1：カードの持ち主を特定する
        $card =StampCard::where('lineuser_id', $request->userId)
        ->where('store_id', $request->store)
        ->get();
    //      2：保持していなければ作成する
        if (isset($card[0])) {
            //複数枚ある場合は、numberで分かる
            // if(count($card)>0){

            // }
            return view('stampCards.stampCard', [
                'card_no'=>$card[0]->id,
                'store_id'=>$card[0]->store_id,
                'uid'=>$card[0]->lineuser_id,
                'expiry'=>$card[0]->expiry,
                'points'=>$card[0]->points,
            ]);
        } else {
            $nwCard = new StampCard();
            $nwCard->lineuser_id=$request->userId;
            $nwCard->store_id=$request->store;
            $nwCard->number=1;
            $nwCard->img=secure_asset('img/1.png');
            // 1 は稼働中
            $nwCard->state=1;

            //有効期限は発行から1年後
            $nwCard->expiry=date("Y-m-d H:i:s", strtotime("+1 year"));
            ;
            $nwCard->points=0;

            $nwCard ->save();
            return view('stampCards.stampCard', [
              'card_no'=>$nwCard->id,
               'expiry'=>$nwCard->expiry,
             'points'=>$nwCard->points,
             'store_id'=>$nwCard->store_id,
             'uid' => $nwCard

     ]);
        }


        // return view('stampCards.stampCard',['uid'=>$request->userId,'store'=>$request->store]);
    }
    public function add(Request $request)
    {
        //pointsがクエリで投げられる時　クーポン投げられる想定はする？
      $toCard =StampCard::where('id',$request->card_no)->first();

      //card_noから検索して、ポイントを加算代入する
// if (isset($toCard)) {
    $toCard->points += $request->points;
    $toCard->save();

    return view('stampCards.stampCard', [
      'uid'=> $toCard->lineuser_id,
      'poins'=>$toCard->points,
      'getPoints'=>$request->points,
      'card_no'=>$request->card_no,
      'expiry' =>$toCard->expiry,
      'store_id'=>$toCard->store_id
    ]);
// }else{
//  // 
// }
    }

    public function create($param)
    {
    }
}
