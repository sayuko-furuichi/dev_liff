<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsedCoupon;

class Coupons extends Controller
{
    //
    function index(Request $request){
        
        $used =UsedCoupon::where('coupon_id',$request->couponId)
        ->where('store_id',$request->store)
        ->where('lineuser_id',$request->user)
        ->first();

        if(isset($used)){
            return view('coupon_sample.44.benefits_4',['request'=>$request]);
        }else{
            return view('coupon_sample.44.benefits_4',['non'=>$non]);
        }

       
    }

    function used(Request $request){
        $nwUsed = new UsedCoupon;
        $nwUsed->coupon_id=$request->couponId;
        $nwUsed->lineuser_id=$request->user;
        $nwUsed->store_id=$request->store;

        $nwUsed->save();


        return redirect('/coupon')->with(['used'=>'used']);
    }
}
