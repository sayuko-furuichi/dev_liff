<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class Reserves extends Controller
{
    private $storeId;
    private $user_id;

    function __construct(Request $request){
        $this->storeId =$request->store;
}
    //全部getして、最後予約の段階でPOSTして保存はどう？
    function menu(Request $request){

        return view('reserves.menu',[
            'request'=>$request
        ]);
    }
    function date(Request $request){
        return view('reserves.dateTime',[
            'request'=>$request
        ]);
       
    }
    function confirm(Request $request){
      
        return view('reserves.confirm',[
            'request'=>$request
        ]);
        
       
    }
    function send(Request $request){
        $credittForm=0;
        if($request->pay=='kureka'){
            $creditForm=1;
        }
        return view('reserves.sendClient',[
            'request'=>$request,
            'cregit'=>$creditForm
        ]);
    }
    function submit(Request $request){
        return view('reserves.submit',[
            'request'=>$request
        ]);
    }
}
