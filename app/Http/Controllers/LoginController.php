<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    
    public function index(Request $request){
        
        // cookieを確認して、自動ログインがオフになっている場合の処理
        if (empty(Cookie::get('user_name_apexreport')) && empty(Cookie::get('password_apexreport'))){
            
            // ログインページに遷移
            return view ('pages.login');
            
        }
        
        // 【以下、自動ログインONの場合の処理】
        
        // クッキーを取得
        $user_name_cookie = $request->cookie('user_name_apexreport');
        $password_cookie = $request->cookie('password_apexreport');
        
        // DBからパスワードを取得
        $record = User::where('user_name' , $user_name_cookie)->first();

        // パスワードを復号化
        $password_db = Crypt::decryptString($record->password);

        // パスワードが正しければマイページへ遷移間違っている場合はエラーメッセージを表示
        if ($password_db == $password_cookie){
            
            // マイページに移動
            return view('pages.mypage' , ['user_name' => $user_name_cookie]);
            
        }else{
            
            return view('pages.login' , ['illegal_login' => '不正なログインです']);
            
        }
        
    }
    
    public function enter(LoginRequest $request){
        
        // "user"テーブルの"last_login"を更新
        User::where('user_name' , $request->user_name)->update(['last_login' => now()]);
        
        if ($request->auto_login == 'on'){
            
            // mypageへ遷移させる処理
            $response = response()->view('pages.mypage' , ['user_name' => $request->user_name]);
            
            // クッキーの登録処理
            $response->cookie('user_name_apexreport' , $request->user_name , 100000);
            $response->cookie('password_apexreport' , $request->password , 100000);
            
            return $response;
        
        }
        
        // "mypage"へ遷移
        return view('pages.mypage' , ['user_name' => $request->user_name]);
        
    }
    
}
