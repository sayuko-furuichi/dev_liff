<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StampCard extends Controller
{
    //
    function index(Request $request){

        //カードの作成から
        //liff.init()後にuserIDが取得できるので、その時にカード取得判定が出来る
      //  $request->userId ='debug';
    
        return view('stampCards.stampCard',['userId'=>$request->userId]);

    }
    function add(Request $request){


      //  return view('stampCards.stampCard',['request'=> $request]);
    
      //redirect->with() は、sessionに渡しているので注意。viewと配列を渡さないので注意
            return redirect('/stamps')->with(['uid'=> $request->user,'point'=>$request->points]);
    }
}
