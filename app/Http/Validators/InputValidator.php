<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class InputValidator extends validator{
    
    // usersテーブルのuser_nameに値が存在するかの確認を行うバリデーション
    public function validateUserName($attribute , $value , $parameters){
        
        echo $attribute;
        echo $value;
        echo $parameters;
        
        exit;
        
    }
    
}