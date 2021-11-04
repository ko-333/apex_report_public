<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DataInputRequest;

use App\Models\User;
use App\Models\BattleMode;
use App\Models\Legends;
use App\Models\Map;
use App\Models\MapDetail;
use App\Models\Weapon;
use App\Models\BattleData;

class DataCorrectController extends Controller
{
    public function index(Request $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
        // 修正対象のidを取得
        $battle_data_id = $request->session()->get('battle_data_id' , $request->battle_data_id);
        
        // 修正対象の記録をDBから取得
        $battle_data = BattleData::all()->where('id' , $battle_data_id)->first();
        
        // ラジオボタンの選択肢
        $item_data = [
            
            'radio_battle_mode' => BattleMode::all() , 
            'radio_legend' => Legends::all() , 
            'radio_map_name' => Map::all() , 
            'radio_drop_zone' => MapDetail::all() , 
            'radio_final_zone' => MapDetail::all() , 
            'checkbox_weapon' => Weapon::all() , 
            'user_name' => $user_name ,
            'battle_data' => $battle_data ,
            
        ];
        
        return view('pages.data_correct' , $item_data);
        
    }
    
    public function view_data_browsing(DataInputRequest $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
        // 修正対象のidを取得
        $battle_data_id = $request->session()->get('battle_data_id' , $request->battle_data_id);
        
        // 変更用のデータを取得
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
        
        // データを変更する
        BattleData::where('id' , $battle_data_id)->update($battle_data);
        
        // データの取得
        $record = BattleData::all()->where('user_id' , $user_id);
        
        $data = [
            
            'records' => $record ,
            'user_name' => $user_name ,
            
        ];
        
        return view('pages.data_browsing' , $data);
        
    }
    
}
