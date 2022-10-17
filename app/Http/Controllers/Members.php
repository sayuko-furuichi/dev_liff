<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Prefecture;

class Members extends Controller
{
    //
    function index(){
        $prefectutes= Prefecture::all();

        return view('members.addMember',['prefecture'=>$prefectutes ]);
    }

    function add(Request $request){
        $nwClient = new Client;
       $nwClient->line_user_id = $request->userId;
       $nwClient->first_name = $request->mei;
       $nwClient->last_name = $request->sei;
       $nwClient->mei = $request->fmei;
       $nwClient->sei = $request->fsei;
       $nwClient->phone_number = $request->phone_number;
       $nwClient->prefecture_id = $request->prefecture_id;
       $nwClient->email = $request->email;
       $nwClient->municipality = $request->municipality;
       $nwClient->house_number = $request->house_number;





        return redirect('/addMember');
    }

    function myPage(){
        return view('members.mypage');
    }
}
