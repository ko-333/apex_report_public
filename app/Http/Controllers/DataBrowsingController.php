<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BattleMode;
use App\Models\Legends;
use App\Models\Map;
use App\Models\MapDetail;
use App\Models\Weapon;
use App\Models\BattleData;

class DataBrowsingController extends Controller
{
    
    public function index(Request $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
        // データ修正用のセッションを削除
        $request->session()->forget('battle_data_id');
        
        // ソート順の取得
        $sort = $request->sort;
        
        // ソート順が取得出来なかった場合は、更新日でソートしておく
        if (is_null($sort)){
            $sort = 'recording_date';
        }
        
        $record = BattleData::where('user_id' , $user_id)->orderBy($sort , 'desc')->get();
        
        
        
        // viewへ渡すデータを配列に格納
        $data = [
            
            'records' => $record ,
            'user_name' => $user_name ,
            'sort' => $sort ,
            
        ];
        
        return view('pages.data_browsing' , $data);
        
    }
    
    
    public function view_data_correct(Request $request){
        
        // ユーザー情報の取得
        $user_name = $request->cookie('user_name_apexreport');
        $user_record = User::where('user_name' , $user_name)->first();
        $user_id = $user_record->id;
        
        // 修正対象の記録をDBから取得
        $battle_data = BattleData::all()->where('id' , $request->battle_data_id)->first();
        
        // 修正対象データのidをセッションに保管
        $request->session()->put('battle_data_id' , $request->battle_data_id);
        
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
        
//        var_dump($item_data['battle_data']['battle_mode']);
//        exit;
        
        return view('pages.data_correct' , $item_data);
        
        
    }
    
}
