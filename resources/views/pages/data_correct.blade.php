<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>データ修正画面</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css">
        <script src="../resources/js/app.js"></script>
    </head>
    <body>
        データ修正画面
        <a href="mypage">前に戻る</a>

        <form action="./data_browsing" method="post">
            @csrf
            @if(count($errors)>0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <table>
            <tr>
                <td><label>この試合のランク帯</label></td>
                <td><label>レジェンド</label></td>
                <td><label>マップ</label></td>
                <td><label>降下地点</label></td>
                <td><label>最終地点</label></td>
                <td><label>武器1</label></td>
                <td><label>武器2</label></td>
                <td><label>順位</label></td>
                <td><label>ラウンド数</label></td>
                <td><label>キル数</label></td>
                <td><label>ダメージ数</label></td>
                <td><label>メモ</label></td>
            </tr>
            <input type="hidden" name="check_input" value="">
            <tr>
                @foreach($radio_battle_mode as $battle_mode_value)
                    @if ($battle_mode_value->category == $battle_data['battle_mode'])
                        <td><input type="radio" name="battle_mode" value="{{$battle_mode_value->category}}" checked="true">{{$battle_mode_value->category}}</td>
                    @else
                        <td><input type="radio" name="battle_mode" value="{{$battle_mode_value->category}}">{{$battle_mode_value->category}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach($radio_legend as $legend_value)
                    @if ($legend_value->legend == $battle_data['legend'])
                        <td><input type="radio" name="legend" value="{{$legend_value->legend}}" checked="true">{{$legend_value->legend}}</td>
                    @else
                        <td><input type="radio" name="legend" value="{{$legend_value->legend}}">{{$legend_value->legend}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach($radio_map_name as $map_name_value)
                    @if ($map_name_value->map_name == $battle_data['map_name'])
                        <td><input type="radio" name="map_name" value="{{$map_name_value->map_name}}" data-mapid="{{$map_name_value->id}}" checked="true">{{$map_name_value->map_name}}</td>
                    @else
                        <td><input type="radio" name="map_name" value="{{$map_name_value->map_name}}" data-mapid="{{$map_name_value->id}}">{{$map_name_value->map_name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach($radio_drop_zone as $drop_zone_value)
                    @if ($drop_zone_value->map_place_name == $battle_data['drop_zone'])
                        <td><input type="radio" name="drop_zone" value="{{$drop_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}" checked="true">{{$drop_zone_value->map_place_name}}</td>
                    @else
                        <td><input type="radio" name="drop_zone" value="{{$drop_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}">{{$drop_zone_value->map_place_name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach($radio_final_zone as $final_zone_value)
                    @if ($final_zone_value->map_place_name == $battle_data['final_zone'])
                        <td><input type="radio" name="final_zone" value="{{$final_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}" checked="true">{{$final_zone_value->map_place_name}}</td>
                    @else
                        <td><input type="radio" name="final_zone" value="{{$final_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}">{{$final_zone_value->map_place_name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach($checkbox_weapon as $weapon_value)
                    @if ($weapon_value->weapon_name == $battle_data['weapon_first'] || $weapon_value->weapon_name == $battle_data['weapon_second'])
                        <td><input type="checkbox" name="weapon[]" value="{{$weapon_value->weapon_name}}" checked="true">{{$weapon_value->weapon_name}}</td>
                    @else
                        <td><input type="checkbox" name="weapon[]" value="{{$weapon_value->weapon_name}}" >{{$weapon_value->weapon_name}}</td>
                    @endif
                @endforeach
            </tr>
            <tr>
                <td><input type="number" name="ranked" min="1" max="30" value="{{$battle_data['ranked']}}"></td>
            </tr>
            <tr>
                <td><input type="number" name="round" min="1" max="6" value="{{$battle_data['round']}}"></td>
            </tr>
            <tr>
                <td><input type="number" name="kill_count" min="0" max="58" value="{{$battle_data['kill_count']}}"></td>
            </tr>
            <tr>
                <td><input type="number" name="damage_count" min="0" max="99999" value="{{$battle_data['damage_count']}}"></td>
            </tr>
            <tr>
                <td><input type="text" name="free_memo" maxlength="100" value="{{$battle_data['free_memo']}}"></td>
            </tr>
        </table>
            <input type="submit" value="入力">
        </form>
    </body>
</html>