<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEvents extends Controller
{
    //
    public function index(){

        return view('send.sendevent');

    }

 public function send(Request $request){
    

    return redirect('/send');

 }
}
