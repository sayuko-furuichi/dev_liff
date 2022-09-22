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

Route::get('/', function () {
    return view('entrance');
});

//Route::get('/','App\Http\Controllers\HomeController@index');

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
    Route::get('/', 'App\Http\Controllers\Reserve@menu')->name('.menu');
    Route::get('/date', 'App\Http\Controllers\Reserve@date')->name('.date');
    Route::get('/confirm', 'App\Http\Controllers\Reserve@confirm')->name('.confirm');
    Route::get('/submit', 'App\Http\Controllers\Reserve@submit')->name('.submit');
});
