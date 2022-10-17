<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class Home extends Controller
{
    //
    public function index(Request $request)
    {
   
        
        return view('entrance');
    }
}
