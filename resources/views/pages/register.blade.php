<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>新規登録ページ</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css"/>
        <link rel="stylesheet" href="../resources/js/app.js"/>
    </head>
    <body>
        新規登録ページ
        <a href="login">前に戻る</a>
        <div class="text-center">
            <h2 class='menutitle'>登録情報を入力してください</h2>
            <form action="./login" method="post">
                @csrf
                <div>
                    <!--@error('user_name')-->
                    <font color="red">{{$message}}</font>
                    <!--@enderror-->
                    <label for="user_name">ユーザー名</label>
                    <input type="text" id="user_name" name="user_name" maxlength="20" value="{{old('user_name')}}" >
                </div>
                <div>
                    <!--@error('password')-->
                    <font color="red">{{$message}}</font>
                    <!--@enderror-->
                    <label for="password">パスワード</label>
                    <input type="text" id="password" name="password" maxlength="16"  value="">
                </div>
                <div>
                    <label for="password_confirmation">パスワード再入力</label>
                    <input type="text" id="password_confirmation" name="password_confirmation" maxlength="16"  value="">
                </div>
                <div>
                    <input type="submit" value="登録">
                </div>
            </form>
            <a href="register">新規ユーザー登録はこちら</a>
        </div>
        <div class='footer'>
        </div>
    </body>
</html>