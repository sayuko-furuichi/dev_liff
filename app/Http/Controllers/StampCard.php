<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StampCard extends Controller
{
    //
    function index(){

        //カードの作成から
    
        return view('stampCards.stampcard');

    }
    function add(){
        return redirect('/stamps');
    }
}
