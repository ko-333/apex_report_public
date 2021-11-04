<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\DataInputRequest;

use App\Models\User;
use App\Models\BattleMode;
use App\Models\Legends;
use App\Models\Map;
use App\Models\MapDetail;
use App\Models\Weapon;
use App\Models\BattleData;

class DataInputController extends Controller
{
    
    // ユーザー情報によって初期表示を変える
    public function index(Request $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
        $item_data = [
            
            'radio_battle_mode' => BattleMode::all() , 
            'radio_legend' => Legends::all() , 
            'radio_map_name' => Map::all() , 
            'radio_drop_zone' => MapDetail::all() , 
            'radio_final_zone' => MapDetail::all() , 
            'checkbox_weapon' => Weapon::all() , 
            'user_name' => $user_name ,
            
        ];
        
        
        return view('pages.data_input' , $item_data);
        
    }
    
    
    public function battle_data_input(DataInputRequest $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
//        var_dump($request->weapon);
//        exit;
        
        $battle_data = [
            
            'user_id' => $user_id , 
            'user_name' => $user_name , 
            'recording_date' => now() ,
            'legend' => $request->legend ,
            'battle_mode' => $request->battle_mode , 
            'map_name' => $request->map_name ,
            'drop_zone' => $request->drop_zone ,
            'final_zone' => $request->final_zone ,
            'ranked' => $request->ranked ,
            'round' => $request->round ,
            'weapon_first' => $request->weapon[0] ,
            'weapon_second' => $request->weapon[1] ,
            'kill_count' => $request->kill_count ,
            'damage_count' => $request->damage_count ,
            'free_memo' => $request->free_memo ,
            
        ];
        
        BattleData::insert($battle_data);
        
        
        $item_data = [
            
            'radio_battle_mode' => BattleMode::all() , 
            'radio_legend' => Legends::all() , 
            'radio_map_name' => Map::all() , 
            'radio_drop_zone' => MapDetail::all() , 
            'radio_final_zone' => MapDetail::all() , 
            'checkbox_weapon' => Weapon::all() , 
            'complete_message' => '登録が完了しました。' ,
            'user_name' => $user_name ,
            
        ];
        
        
        
        return view('pages.data_input' , $item_data);
        
        
        
        
    }
    
    
}
