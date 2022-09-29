<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StampCard extends Controller
{
    //
    function index(){

        //カードの作成から
        //liff.init()後にuserIDが取得できるので、その時にカード取得判定が出来る
    
        return view('stampCards.stampCard');

    }
    function add(Request $request){

        // if(isset($request->points)){

        // }

        return view('stampCards.stampCard',['request'=> $request]);
        //    return redirect('/stamps')->with(['request'=> $request]);
    }
}
