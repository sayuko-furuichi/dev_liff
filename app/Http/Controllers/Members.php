<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Members extends Controller
{
    //
    function index(){
        return views('members.addMember');
    }

    function add(){
        return redirect('/addMember');
    }
}
