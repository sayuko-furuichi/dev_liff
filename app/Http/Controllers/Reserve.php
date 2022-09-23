<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reserve extends Controller
{
    private $storeId;
    private $user_id;

    function __construct(Request $request){
        $this->storeId =$request->store;

}


    function menu(Request $request){

        return view('reserves.menu');
    }
    function date(Request $request){
        return view('reserves.dateTime');
    }
    function confirm(Request $request){
        return view('reserves.confirm');
    }
    function send(Request $request){
        return view('reserves.sendClient');
    }
    function submit(Request $request){
        return view('reserves.submit');
    }
}
