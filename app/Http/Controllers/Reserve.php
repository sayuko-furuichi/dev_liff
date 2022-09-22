<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Reserve extends Controller
{
    //
    function menu(){
        return view('reserves.menu');
    }
    function date(){
        return view('reserves.dateTime');
    }
    function confirm(){
        return view('reserves.confirm');
    }
    function submit(){
        return view('reserves.submit');
    }
}
