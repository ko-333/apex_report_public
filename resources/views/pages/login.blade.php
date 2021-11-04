<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Apex Legends の戦闘記録をつけるためのもの">
        <title>ログイン</title>
        <link rel="shortcut icon" href="../public/favicon.ico" >
        <link rel="stylesheet" href="../resources/css/app.css"/>
        <link rel="stylesheet" href="../resources/js/app.js"/>
    </head>
    <body>
        <div class="text-center">
            @isset($register_comp_msg)
                {{$register_comp_msg}}
            @endisset
            @isset($illegal_login)
                {{$illegal_login}}
            @endisset
            <h2 class='menutitle'>ログイン情報を入力してください</h2>
            <form action="./mypage" method="post">
                @csrf
                <div>
                    @error('user_name')
                        {{$message}}
                    @enderror
                    <label for="user_name">ユーザー名</label>
                    <input type="text" id="user_name" name="user_name" maxlength="20" value="{{old('user_name')}}" >
                </div>
                <div>
                    @error('password')
                        {{$message}}
                    @enderror
                    <label for="password">パスワード</label>
                    <input type="text" id="password" name="password" maxlength="20">
                </div>
                <div>
                    @error('auto_login')
                        {{$message}}
                    @enderror
                    <label for="auto_login">次回から自動でログインする</label>
                    <input type="checkbox" id="auto_login" name="auto_login">
                </div>
                <div>
                    <input type="submit" value="ログイン">
                </div>
            </form>
            <a href="register">新規ユーザー登録はこちら</a>
        </div>
        <div class='footer'>
        </div>
    </body>
</html>