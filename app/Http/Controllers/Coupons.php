<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsedCoupon;
use App\Models\CouponMst;

class Coupons extends Controller
{
    //
    function index(Request $request){

        //前ページで送信されたものだけ表示
        $usedC =UsedCoupon::where('store_id', $request->store)->get();
       $usedC= $usedC->whereIn('lineuser_id', $request->uid);

//foreachで使用する
       $cps=array();
       $i=0;

       //クーポンを使えるか確認
foreach ($request->cps as $cp) {
   $cp= json_decode($cp,true);

    //ポイントを満たしているか
    if ( $request->points >= $cp['term_of_use_point']) {
        //使用されていないか
        $useds=collect([]);
      $useds= $usedC->where('coupon_id', $cp['id']);

        if($useds->isEmpty()){
            $cps[$i] =$cp;
            $i++;
           

        }
       
    }

}


if($cps == null){
    return view('coupon_sample.index',['notFound'=>'not_found']);
}else{
    return view('coupon_sample.index',['cps'=>$cps,'store'=>$request->store]);
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
    function viewCoupon(Request $request){

      //  dd($request);


        return view('coupon_sample.44.benefits_4',['request'=>$request]);
    }

    function used(Request $request){
        $nwUsed = new UsedCoupon;
        $nwUsed->coupon_id=$request->couponId;
        $nwUsed->lineuser_id=$request->user;
        $nwUsed->store_id=$request->store;

        $nwUsed->save();


        return view ('coupon_sample.44.benefits_4',['used'=>'used','store'=>$nwUsed->store_id]);
    }
}
