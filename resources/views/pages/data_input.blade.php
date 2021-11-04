<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>データ入力画面</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css"/>
        <link rel="stylesheet" href="../resources/js/app.js"/>
    </head>
    <body>
        {{$user_name}}さんのデータ入力画面
        <a href="mypage">前に戻る</a>
        <form action="data_input" method="post">
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
                    <td><input type="radio" name="battle_mode" value="{{$battle_mode_value->category}}">{{$battle_mode_value->category}}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($radio_legend as $legend_value)
                    <td><input type="radio" name="legend" value="{{$legend_value->legend}}">{{$legend_value->legend}}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($radio_map_name as $map_name_value)
                    <td><input type="radio" name="map_name" value="{{$map_name_value->map_name}}" data-mapid="{{$map_name_value->id}}">{{$map_name_value->map_name}}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($radio_drop_zone as $drop_zone_value)
                    <td><input type="radio" name="drop_zone" value="{{$drop_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}">{{$drop_zone_value->map_place_name}}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($radio_final_zone as $final_zone_value)
                    <td><input type="radio" name="final_zone" value="{{$final_zone_value->map_place_name}}" data-mapid="{{$drop_zone_value->map_id}}">{{$final_zone_value->map_place_name}}</td>
                @endforeach
            </tr>
            <tr>
                @foreach($checkbox_weapon as $weapon_value)
                    <td><input type="checkbox" name="weapon[]" value="{{$weapon_value->weapon_name}}" >{{$weapon_value->weapon_name}}</td>
                @endforeach
            </tr>
            <tr>
                <td><input type="number" name="ranked" min="1" max="30"></td>
            </tr>
            <tr>
                <td><input type="number" name="round" min="1" max="6"></td>
            </tr>
            <tr>
                <td><input type="number" name="kill_count" min="0" max="58"></td>
            </tr>
            <tr>
                <td><input type="number" name="damage_count" min="0" max="99999"></td>
            </tr>
            <tr>
                <td><input type="text" name="free_memo" maxlength="100"></td>
            </tr>
        </table>
            <input type="submit" value="入力">
        </form>
    </body>
</html>