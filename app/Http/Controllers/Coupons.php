<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsedCoupon;

class Coupons extends Controller
{
    //
    function index(Request $request){

        return view('coupon_sample.44.benefits_4',['request'=>$request]);
    }

    function used(Request $request){
        $nwUsed = new UsedCoupon;
        
        return redirect('/coupon');
    }
}
