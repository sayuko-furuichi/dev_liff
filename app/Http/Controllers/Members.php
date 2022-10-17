<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class Members extends Controller
{
    //
    function index(){
        return view('members.addMember');
    }

    function add(Request $request){
        $nwClient = new Client;
       $nwClient->line_user_id = $request->userId;
       $nwClient->first_name = $request->mei;
       $nwClient->last_name = $request->sei;
       $nwClient->mei = $request->fmei;
       $nwClient->sei = $request->fsei;
       $nwClient->phone_number = $request->phone_number;
       $nwClient->email = $request->email;





        return redirect('/addMember');
    }

    function myPage(){
        return view('members.mypage');
    }
}
