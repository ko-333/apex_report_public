<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataInputRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        
        // 許可するページ名をtrueに入力
        if ($this->path() == 'data_input' || $this->path() == 'data_browsing'){
            
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
            //required_without_all
            
            'check_input' => ['required_without_all:battle_mode,legend,map_name,drop_zone,final_zone,weapon,ranked,round,kill_count,damage_count,free_memo'] ,
            'battle_mode' => ['nullable'] ,
            'legend' => ['nullable'] ,
            'map_name' => ['nullable'] ,
            'drop_zone' => ['nullable'] ,
            'final_zone' => ['nullable'] ,
            'weapon' => ['nullable' , 'array' , 'max:2'] ,
            'ranked' => ['nullable' , 'integer' , 'between:1,30'] ,
            'kill_count' => ['nullable' , 'integer' , 'between:0,58'] ,
            'damage_count' => ['nullable' , 'integer' , 'digits_between:0,5'] ,
            'free_memo' => ['nullable' , 'String' , 'max:100'] ,
            
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
            'check_input.required_without_all' => 'どれか一つ入力してください' , 
            'weapon.max' => '武器は2個までしか選択できません' , 
            'ranked.numeric' => '順位は1-30の間で入力してください' , 
            'kill_count.between' => 'キル数は0-58の間で入力してください' ,
            'damage_count.digits' => 'ダメージ数は5桁以内で入力してください' ,
            'free_memo.max' => 'メモ欄は100文字以内で入力してください' ,
        ];
        
    }
    
    public function passedValidation(){
        
        // 武器データの初期値としてnullを入れておく
        $weapon = [null , null];
        
        // 以下、チェックボックスやラジオボタンでの選択がなかった場合の処理
//        if(isset($data['battle_mode']) == false){ $data['battle_mode'] = null ; } // 現在のランク
//        if(isset($data['legend']) == false){ $data['legend'] = null ; } // レジェンド
//        if(isset($data['map_name']) == false){ $data['map_name'] = null ; } // マップ
//        if(isset($data['drop_zone']) == false){ $data['drop_zone'] = null ; } // 降下地点
//        if(isset($data['final_zone']) == false){ $data['final_zone'] = null ; } // 最終地点
//        if(isset($data['weapon'][0]) == false){ $data['weapon'][0] = null ; } // 武器1
//        if(isset($data['weapon'][1]) == false){ $data['weapon'][1] = null ; } // 武器2
        
        // 以下、チェックボックスやラジオボタンでの選択がなかった場合の処理
        if(isset($this->battle_mode) == false){ $this->battle_mode = null ; } // 現在のランク
        if(isset($this->legend) == false){ $this->legend = null ; } // レジェンド
        if(isset($this->map_name) == false){ $this->map_name = null ; } // マップ
        if(isset($this->drop_zone) == false){ $this->drop_zone = null ; } // 降下地点
        if(isset($this->final_zone) == false){ $this->final_zone = null ; } // 最終地点
        if(isset($this->weapon[0])){ $weapon[0] = $this->weapon[0]; } // 武器1
        if(isset($this->weapon[1])){ $weapon[1] = $this->weapon[1]; } // 武器2
        $this->weapon = $weapon;    // 武器1と武器2をweaponに設定
        
    }
    
    
}
