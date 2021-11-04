<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Validators\InputValidator\InputValidator;

class RegisterRequest extends FormRequest
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
        if ($this->path() == 'login'){
            
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
    public function rules(){
        
        return [
            'user_name' => ['required' , 'max:20' , 'unique:users,user_name' , 'regex:/^[a-zA-Z0-9!-~]+$/'] ,
            'password' => ['required' , 'min:4' , 'max:20' , 'confirmed' , 'regex:/^[a-zA-Z0-9!-~]+$/'] ,
            'password_confirmation' => ['required' , 'min:4' , 'max:20' , 'regex:/^[a-zA-Z0-9!-~]+$/'] ,
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
            'user_name.max' => 'ユーザー名は20文字以内で登録してください' , 
            'user_name.unique' => '既に存在するユーザー名です' , 
            'user_name.regex' => 'ユーザー名に使える文字は、半角英数字と記号のみです' , 
            'password.required' => 'パスワードを入力してください' , 
            'password.min' => 'パスワードは4文字以上20文字以内で入力してください' , 
            'password.max' => 'パスワードは4文字以上20文字以内で入力してください' , 
            'password.confirmed' => 'パスワードが再入力と一致しません' , 
            'password.regex' => 'パスワードに使える文字は、半角英数字と記号のみです' ,
        ];
        
        
    }
}
