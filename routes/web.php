<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('login' , 'App\Http\Controllers\LoginController@index');
Route::get('mypage' , 'App\Http\Controllers\MypageController@index');    // マイページ
Route::post('mypage','App\Http\Controllers\LoginController@enter');
Route::post('logout' , 'App\Http\Controllers\MypageController@logout');    // マイページ
// 各ページリンク
Route::get('register' , function(){return view('pages.register');});    // 新規ユーザー登録画面
Route::post('login' ,'App\Http\Controllers\RegisterController@index');    // 新規ユーザー登録画面

Route::get('data_input' , 'App\Http\Controllers\DataInputController@index');    // データ入力画面
Route::post('data_input' , 'App\Http\Controllers\DataInputController@battle_data_input');    // データ入力画面

Route::get('data_browsing' , 'App\Http\Controllers\DataBrowsingController@index');    // データ閲覧画面
Route::post('data_browsing' , 'App\Http\Controllers\DataCorrectController@view_data_browsing');    //データ閲覧画面

Route::post('data_correct' , 'App\Http\Controllers\DataBrowsingController@view_data_correct');    // データ修正画面
Route::get('data_correct' , 'App\Http\Controllers\DataCorrectController@index');    // データ修正画面


Route::get('data_totalling' , function(){return view('pages.data_totalling');});    // 集計データ閲覧画面
Route::get('change_password' , function(){return view('pages.change_password');});    // パスワード変更画面
Route::get('withdrawal' , function(){return view('pages.withdrawal');});    // ユーザー削除画面