<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Members extends Controller
{
    //
    function index(){
        return views('member.addMember');
    }

    function add(){
        return redirect('/addMember');
    }
}
