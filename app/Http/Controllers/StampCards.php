<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StampCard;
class StampCards extends Controller{


    function login(Request $request){
        return view('stampCards.login',['storeId'=>$request->store]);
        //カードの作成から
        //liff.init()後にuserIDが取得できるので、その時にカード取得判定が出来る
      //  $request->userId ='debug';
      //  return view('stampCards.stampCard',['userId'=>$request->userId]);
    }

    //
    function index(Request $request){
    
    
    //UserIdとstore_idをrequestに保持している状態
        //1：カードの持ち主を特定する
        $card =StampCard::where('lineuser_id',$request->userId)
        ->where('store_id',$request->store)
        ->get();
    //      2：保持していなければ作成する
    if(!isset($card)){
       $nwCard = new StampCard;
       $nwCard->lineuser_id=$request->userId;
       $nwCard->store_id=$request->store;
       $nwCard->namber=1;
       // 1 は稼働中
       $nwCard->state=1;

       //有効期限・ポイントカラム作成
      // $nwCard->expiry=
      // $nwCard->points=0

      $nwCard ->save();
      return view('stampCards.stampCard',['request'=>$request]);
    }else{
        return view('stampCards.stampCard',['cards'=>$card]);
  
    }
        

  return view('stampCards.stampCard',['uid'=>$request->userId,'store'=>$request->store]);
    }
    function add(Request $request){


      //  return view('stampCards.stampCard',['request'=> $request]);
    
      //redirect->with() は、sessionに渡しているので注意。viewと配列を渡さないので注意
            return redirect('/stamps/index')->with(['uid'=> $request->user,'point'=>$request->points]);
    }

    function create($param){

    }

}
