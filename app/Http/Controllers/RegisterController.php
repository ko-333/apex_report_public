<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class RegisterController extends Controller
{
    
    
    // RegisterRequestにてバリデーション済み
    public function index(RegisterRequest $request){
        
        // ユーザーの入力したパスワードとユーザー名を取得
        $account = [
            'user_name' => $user_name = $request->user_name ,
            'password' => $password = Crypt::encryptString($request->password) ,   // パスワードは暗号化して取得する
        ];
        
        // DBへの登録処理
        $user = new User;
        $user->fill($account)->save();
        
        // テンプレートに送信する値を定義
        $blade_value = [
            'register_comp_msg' => '登録が完了しました'
        ];
        
        return view('pages.login' , $blade_value);
    }
    
}
