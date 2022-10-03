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

        //前ページで送信されたものだけ表示
foreach ($request->cps as $cp) {
    $used=1;
    //ポイントを満たしているか
    if ( $request->points >= $cp->term_of_use_point) {
        //使用されていないか
        $used =UsedCoupon::where('coupon_id', $cp->id)
        ->where('store_id', $request->store)
        ->where('lineuser_id', $request->uid)
        ->first();
        if($used==null){
            $cps[] += $cp;
        }
        
    }

}
if($cps[0] == null){
    return view('coupon_sample.index',['notFound'=>'not_found']);
}else{
    return view('coupon_sample.index',['cps'=>$cps]);
}
           
            //store　とuidで引いておいて、forで回すときにｃｐidで検索した方が早そう

       





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
