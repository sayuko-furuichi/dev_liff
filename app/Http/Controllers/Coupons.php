<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsedCoupon;
use App\Models\CouponMst;

class Coupons extends Controller
{
    //
    function index(Request $request){
        //まず全部表示
        $cps =CouponMst::where('store_id',$request->store)
        ->where('exiry','>',date('Y-m-d H:i:s'))->get();

return view('coupon_sample.index',['cps'=>$cps]);


        // $used =UsedCoupon::where('coupon_id',$request->couponId)
        // ->where('store_id',$request->store)
        // ->where('lineuser_id',$request->user)
        // ->first();

        // if($used == null){
        //     return view('coupon_sample.44.benefits_4',['request'=>$request]);
        // }else{
        //     return view('coupon_sample.44.benefits_4',['non'=>'non']);
        // }

       
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
