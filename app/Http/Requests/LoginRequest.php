<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Providers\ValidatorServiceProvider;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * 
     * バリデーション関連のみ記載
     * 
     */
    public function authorize(){
        
        // 許可するページ名をtrueに入力
        if ($this->path() == 'mypage'){
            
            return true;
            
        }else{
            
            return false;
            
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => ['required' ,  'exists:users,user_name'] ,
            'password' => ['required' , 'password_decrypt'] ,
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * エラー文を配列で返す
     * 
     * 
     * @return array
     */
    public function messages(){
        
        return [
            'user_name.required' => 'ユーザー名を入力してください' , 
            'user_name.exists' => 'ユーザー名もしくはパスワードが違います' , 
            'password.required' => 'パスワードを入力してください' ,
            'password_decrypt' => 'ユーザー名もしくはパスワードが違います' ,
        ];
        
        
    }
}
