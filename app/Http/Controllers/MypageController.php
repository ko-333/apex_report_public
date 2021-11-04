<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MypageController extends Controller
{
    
    public function index(Request $request){
        
        
        return view('pages.mypage');
        
    }
    
    // ログアウト処理
    public function logout(Request $request){
        
        // ログアウトボタンが押されたことを確認
        if ($request->logout == 'on'){
            
            // クッキーの削除
            Cookie::queue(Cookie::forget('user_name_apexreport'));
            Cookie::queue(Cookie::forget('password_apexreport'));
            
            // ログイン画面に遷移
            return view('pages.login');
            
        }else{
            
            // マイページに戻す
            return redirect('mypage');
            
        }
        
        
    }
    
    
    // クッキーの更新
//    public function update_cookie_limit(Request $request){
//        
//        
//        
//    }
}
