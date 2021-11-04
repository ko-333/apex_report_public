<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>マイページ</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css"/>
        <link rel="stylesheet" href="../resources/js/app.js"/>
    </head>
    <body>
        <div>
            <p>
                @isset($user_name)
                    {{$user_name}}のマイページ
                @endisset
            </p>
            <form action="./logout" method="post">
                @csrf
                <input type="hidden" name="logout" value="on">
                <input type="submit" value="ログアウト">
            </form>
        </div>
        <a href="register">新規ユーザー登録画面</a>
        <a href="data_input">データ入力画面</a>
        <a href="data_correct">データ修正画面</a>
        <a href="data_browsing">データ閲覧画面</a>
        <a href="data_totalling">データ集計画面</a>
        <a href="change_password">パスワード変更画面</a>
        <a href="withdrawal">退会画面</a>
        <a href="login">ログイン画面</a>
    </body>
</html>