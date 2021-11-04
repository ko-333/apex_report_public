<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        // パスワードチェック用のバリデーション
        Validator::extend('password_decrypt' , function($attribute , $value , $parameters , $validator){
            
            // requestからユーザー名を取得
            $user_name = request()->user_name;
            
            // DBからパスワードを取得
            $record = User::where('user_name' , $user_name)->first();
            
            // ユーザー名が空欄の場合はfalseを返す
            if ($record == ''){
                return false;
            }
            
            // パスワードを復号化
            $password = Crypt::decryptString($record->password);
            
            // パスワードが正しければtrue違っていればfalseを返す
            if ($value == $password){
                return true;
            }else{
                return false;
            }
            
        });
        
        
    }
}
