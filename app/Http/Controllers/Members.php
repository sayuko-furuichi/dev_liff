<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Prefecture;

class Members extends Controller
{
    //
    public function index(Request $request)
    {
        $prefectutes= Prefecture::all();

        return view('members.addMember', ['prefecture'=>$prefectutes ,'store_id'=>$request->store]);
    }

    public function add(Request $request)
    {
        $nwClient = new Client();
        $nwClient->line_user_id = $request->userId;
        $nwClient->first_name = $request->mei;
        $nwClient->last_name = $request->sei;
        $nwClient->mei = $request->fMei;
        $nwClient->sei = $request->fSei;
        $nwClient->phone_number = $request->tel;
        $nwClient->prefecture_id = $request->prefecture_id;
        $nwClient->email = $request->email;
        $nwClient->municipality = $request->municipality;
        $nwClient->house_number = $request->house_number;
        $nwClient->line_user_id = $request->userId;
        $nwClient->building_name ='';
        $nwClient->store_id = $request->store_id;
        $nwClient->c_corporate_number=0;
        $nwClient->c_corporate_name='';
        $nwClient->referral_number =0;

        $nwClient->save();

        //JSONでBotにpostする




        return redirect('/addMember')->with('result', '登録が完了しました！');
    }

    public function myPage()
    {
        return view('members.mypage');
    }
}
