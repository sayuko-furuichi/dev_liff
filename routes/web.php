<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\SendServiceMsg;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//retiurn view() で行った方が早いかも
Route::get('/', 'App\Http\Controllers\Home@index');

//get user data
Route::get('/user', 'App\Http\Controllers\getUser@index')
->name('getuser.index');
//get user data POST
Route::post('/user', 'App\Http\Controllers\getUser@getUser')
->name('getuser.post');

//DBshow
Route::get('/dbshow', 'App\Http\Controllers\getUser@dbshow')
->name('getuser.show');

//会計
Route::get('/kaikei', 'App\Http\Controllers\kaikei@index')-> name('kaikei');

//予約
Route::get('/yoyaku', 'App\Http\Controllers\yoyaku@index')
-> name('yoyaku');

//注文
Route::get('/inputOrders', 'App\Http\Controllers\InputOrders@index')-> name('inputOrders.index');
Route::post('/inputOrders/{products_id?}/{number?}', 'App\Http\Controllers\InputOrders@inputOrder')

-> name('inputOrders.rgst');

//注文履歴
Route::get('/history', 'App\Http\Controllers\history@historyIndex')
->name('history.index');
Route::post('/history', 'App\Http\Controllers\history@historyView')
->name('history.view');


//スタンプ
Route::get('/stamp', 'App\Http\Controllers\stamp@index')-> name('stamp');

//send service message
// Route::get('/send','App\Http\Controllers\HomeController@getUser')-> name('sendsm');

//公式アカウントへイベントを送信send
Route::get('/send', 'App\Http\Controllers\SendEvents@index')-> name('send.index');
Route::post('/send', 'App\Http\Controllers\SendEvents@send')-> name('send.send');

//0921 会員登録ページ store_idのクエリつけて飛ばす？
Route::get('/addMember', 'App\Http\Controllers\Members@index')-> name('member.index');
Route::post('/addMember', 'App\Http\Controllers\Members@add')-> name('member.add');

//0921 会員証ページ
Route::get('/Member/{id?}', 'App\Http\Controllers\Members@myPage')-> name('member.mypage');
// Route::post('/Member/{id?}','App\Http\Controllers\Members@myPage')-> name('member.mypage');

//0922 予約ページ store_idのクエリつけて飛ばす？
Route::group(['prefix' => '/reserve', 'as' => 'reserve' ], function () {
    Route::get('/', 'App\Http\Controllers\Reserves@menu')->name('.menu');
    Route::get('/date', 'App\Http\Controllers\Reserves@date')->name('.date');
    Route::get('/date/confirm', 'App\Http\Controllers\Reserves@confirm')->name('.confirm');
    Route::get('/date/confirm/send', 'App\Http\Controllers\Reserves@send')->name('.send');
    Route::post('/date/confirm/send', 'App\Http\Controllers\Reserves@submit')->name('.submit');
});

//0921 スタンプカードページ store_idのクエリつけて飛ばす？
Route::group(['prefix' => '/stamps', 'as' => 'stamps' ], function () {

    Route::get('/', 'App\Http\Controllers\StampCards@login')-> name('.login');
    Route::get('/add', 'App\Http\Controllers\StampCards@add')-> name('.add');
    Route::get('/index', 'App\Http\Controllers\StampCards@index')-> name('.index');
});

//0927 流入経路調査
Route::group(['prefix' => '/addRoute', 'as' => 'addroute' ], function () {
    Route::get('/', 'App\Http\Controllers\AddInflowRoutes@index')-> name('.index');
    Route::post('/', 'App\Http\Controllers\AddInflowRoutes@add')-> name('.add');
});
Route::group(['prefix' => '/getInflow', 'as' => 'getinflow' ], function () {
    Route::get('/', 'App\Http\Controllers\GetInflowRoutes@index')-> name('.index');
    Route::post('/', 'App\Http\Controllers\GetInflowRoutes@add')-> name('.add');
});


//0930 coupon
Route::group(['prefix' => '/coupon', 'as' => 'coupon' ], function () {
    Route::get('/', 'App\Http\Controllers\Coupons@index')-> name('.index');
    Route::post('/', 'App\Http\Controllers\Coupons@used')-> name('.used');
});