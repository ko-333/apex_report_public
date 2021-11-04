<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>データ閲覧画面</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css"/>
        <link rel="stylesheet" href="../resources/js/app.js"/>
    </head>
    <body>
        データ閲覧画面
        <a href="mypage">前に戻る</a>
        <table>
            <tr>
                <td><a href="./data_browsing?sort=recording_date">記録日</a></td>
                <td><a href="./data_browsing?sort=battle_mode">ランク</td>
                <td><a href="./data_browsing?sort=legend">レジェンド</td>
                <td><a href="./data_browsing?sort=map_name">マップ</td>
                <td><a href="./data_browsing?sort=drop_zone">降下地点</td>
                <td><a href="./data_browsing?sort=final_zone">最終地点</td>
                <td><a href="./data_browsing?sort=weapon_first">武器1</td>
                <td><a href="./data_browsing?sort=weapon_second">武器2</td>
                <td><a href="./data_browsing?sort=round">ラウンド</td>
                <td><a href="./data_browsing?sort=ranked">順位</td>
                <td><a href="./data_browsing?sort=kill_count">キル数</td>
                <td><a href="./data_browsing?sort=damage_count">ダメージ数</td>
                <td>フリーメモ</td>
            </tr>
            @foreach($records as $record)
                <form action="./data_correct" method="post">
                    @csrf
                    <tr>
                        <td>{{$record['recording_date']}}</td>
                        <td>{{$record['battle_mode']}}</td>
                        <td>{{$record['legend']}}</td>
                        <td>{{$record['map_name']}}</td>
                        <td>{{$record['drop_zone']}}</td>
                        <td>{{$record['final_zone']}}</td>
                        <td>{{$record['weapon_first']}}</td>
                        <td>{{$record['weapon_second']}}</td>
                        <td>{{$record['round']}}</td>
                        <td>{{$record['ranked']}}</td>
                        <td>{{$record['kill_count']}}</td>
                        <td>{{$record['damage_count']}}</td>
                        <td>{{$record['free_memo']}}</td>
                        <input type="hidden" name="battle_data_id" value="{{$record['id']}}">
                        <td><input type="submit" value="修正する"></td>
                    </tr>
                </form>
            @endforeach
        </table>
    </body>
</html>