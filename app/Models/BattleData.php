<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleData extends Model{
    
    use HasFactory;
    
    // テーブル名の定義
    protected $table = 'battle_data';
    
    // タイムスタンプを無効化
    public $timestamps = false;
    
}
