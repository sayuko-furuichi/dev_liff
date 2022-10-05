<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StampCard;
use App\Models\UsedCoupon;
use App\Models\CouponMst;

class StampCards extends Controller
{
    public function login(Request $request)
    {
        //アプリ立ち上げ時、userIdの取得のためにリダイレクトさせる
        return view('stampCards.login', ['storeId'=>$request->store]);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     *   @param $request->userId
     *   @param $request->store
     * @return void
     */
 function dev(){

    return view('stampCards.dev_scr');
 }


    public function index(Request $request)
    {
        //発行された特典クーポンがあるかどうか確認
        $date =date('Y-m-d H:i:s');
        //   $cp =CouponMst::whereDate('exiry','>',$date)->get();
        //  $cp= $cp->whereIn('store_id',$request->store)->sortBy('term_of_use_point');

        $cp =CouponMst::where('store_id', $request->store)->get();

        $cp= $cp->where('exiry', '>', $date)->sortBy('term_of_use_point');

        //couponが無い場合の処理


        //UserIdとstore_idをrequestに保持している状態
        //1：カードの持ち主を特定する
        $card =StampCard::where('lineuser_id', $request->userId)->get();
        //TODO:debug用　新しいもののみ表示
        $card= $card->where('store_id', $request->store)->where('state',1)->sortByDesc('id');



    //      2：保持していなければ作成する
        if (isset($card[0])) {
            //複数枚ある場合は、numberで分かる
            // if(count($card)>0){

            // }

            //カードがある場合、使用できるクーポンも取得する
            //  $coupon = CouponMst::where('store_id',$card[0]->store_id)->where('term_of_use_points',$points);


            return view('stampCards.stampCard', [
                'card_no'=>$card[0]->id,
                'store_id'=>$card[0]->store_id,
                'uid'=>$card[0]->lineuser_id,
                'expiry'=>$card[0]->expiry,
                'points'=>$card[0]->points,
                'now_points'=>$card[0]->now_points,
                'max_points'=>$card[0]->max_points,
                'number'=>$card[0]->number,
                'cps'=>$cp
            ]);
        } else {
            $nwCard = new StampCard();
            $nwCard->lineuser_id=$request->userId;
            $nwCard->store_id=$request->store;
            $nwCard->number=1;
            $nwCard->img=secure_asset('img/1.png');
            // 1 は稼働中
            $nwCard->state=1;

            //有効期限は発行から1年後
            $nwCard->expiry=date("Y-m-d H:i:s", strtotime("+1 year"));

            $nwCard->points=0;
            $nwCard->now_points=0;

            //TODO:とりあえず8ポイントがmax
            $nwCard->max_points=8;

            $nwCard ->save();
            return view('stampCards.stampCard', [
              'card_no'=>$nwCard->id,
               'expiry'=>$nwCard->expiry,
             'points'=>$nwCard->points,
             'now_points'=>$nwCard->now_points,
             'store_id'=>$nwCard->store_id,
             'max_points'=>$nwCard->max_points,
             'number'=>$nwCard->number,
             'uid' => $nwCard->lineuser_id,
             'cps'=>$cp

     ]);
        }


        // return view('stampCards.stampCard',['uid'=>$request->userId,'store'=>$request->store]);
    }
    public function add(Request $request)
    {

       //TODO:indexにredirectさせる？　発行された特典クーポンがあるかどうか確認
       $date =date('Y-m-d H:i:s');
       //   $cp =CouponMst::whereDate('exiry','>',$date)->get();
       //  $cp= $cp->whereIn('store_id',$request->store)->sortBy('term_of_use_point');

       $cp =CouponMst::where('store_id', $request->store)->get();

       $cp= $cp->where('exiry', '>', $date)->sortBy('term_of_use_point');
        //pointsがクエリで投げられる時　クーポン投げられる想定はする？
        $toCard =StampCard::where('id', $request->card_no)->first();

        //card_noから検索して、ポイントを加算代入する
        // if (isset($toCard)) {
        $toCard->now_points += (int)$request->points;
        $toCard->points += (int)$request->points;

        //ポイント数がmaxを超えたとき新カード発行
        if ($toCard->now_points >= $toCard->max_points) {
            $nwCard = new StampCard();
            $nwCard->lineuser_id=$toCard->lineuser_id;
            $nwCard->store_id=$request->store;
            $nwCard->number=$toCard->number +1;
            $nwCard->img=secure_asset('img/1.png');

            // 1 は稼働中
            $nwCard->state=1;

            //古いカードをnegativeにする
            $toCard->state=0;


            //有効期限は発行から1年後
            $nwCard->expiry=date("Y-m-d H:i:s", strtotime("+1 year"));

            $nwCard->points += $toCard->points;
            //ポイントが増えすぎた分は繰り越し
            $nwCard->now_points= $toCard->now_points - $toCard->max_points;
            $toCard->now_points=$toCard->max_points;
            //TODO:とりあえず8ポイントがmax
            $nwCard->max_points=8;

            $nwCard ->save();
            $toCard->save();

            //表示の仕方が謎だが、とりあえず作成はしておく

            return view('stampCards.stampCard', [
                 'uid'=> $nwCard->lineuser_id,
                 'points'=>$nwCard->points,
                 'getPoints'=>$request->points,
                 'card_no'=>$nwCard->id,
                 'expiry' =>$nwCard->expiry,
                 'store_id'=>$nwCard->store_id,
                 'max_points'=>$nwCard->max_points,
                 'now_points'=>$nwCard->now_points,
                 'number'=>$nwCard->number,
                 'cps'=>$cp,
                 'new'=>'新しいカードを作成しました'
               ]);
        } else {
            $toCard->save();
            return view('stampCards.stampCard', [
              'uid'=> $toCard->lineuser_id,
              'points'=>$toCard->points,
              'getPoints'=>$request->points,
              'card_no'=>$request->card_no,
              'expiry' =>$toCard->expiry,
              'store_id'=>$toCard->store_id,
              'max_points'=>$toCard->max_points,
              'now_points'=>$toCard->now_points,
              'number'=>$toCard->number,
              'cps'=>$cp
            ]);
        }
    }

    public function create($param)
    {
    }
}
