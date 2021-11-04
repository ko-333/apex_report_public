<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    // テーブル名の定義
    protected $table = 'users';
    
    // 登録を許可するフィールドの定義
    protected $fillable = ['user_name' , 'password'];
    
}
