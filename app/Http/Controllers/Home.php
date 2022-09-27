<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class Home extends Controller
{
    //
    public function index(Request $request)
    {
        if(($request->route && $request->store) !=null ){
          //  return view('inflowRoute.getInflowRoute',['requests'=>$request]);
          $store = Store::where('id',$request->store)->first();

         return redirect($store->account_url);
        }
        return view('entrance');
    }
}
