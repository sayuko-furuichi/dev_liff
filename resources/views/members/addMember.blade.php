<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/liff.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>会員登録画面</title>
</head>

<body>
    {{-- <form method="get">
            @csrf
            <button type="submit" href="{{ route('getuser.index') }}">user</button>
        </form>

        <a href="{{ route('kaikei') }}">会計</a>
        <a href="{{ route('yoyaku') }}">予約</a>
        <a
            href="https://liff.line.me/1654883656-XqwKRkd4?aid=060rxmbw&utm_source=LINE&utm_medium=Owner&utm_campaign=Share">ショップカード</a>
        <a href="{{ route('inputOrders.index') }}">注文</a>
        <a href="https://liff.line.me/1657181787-2vrnwwlj">LIFFへ遷移</a>
       
        <a href="https://lin.ee/mjCgvBo">発行中のクーポン</a>
        <a href="https://line-logins.herokuapp.com/gotoauthpage">line_login</a> --}}

    <div class="note"></div>
{{--  name属性つける  --}}
    <p>名前　　<span style="color: red">必須</span></p>
    <input type="text" placeholder="姓" style="width:30%" required>　　<input type="text" placeholder="名"
        style="width:30%" required>

        <p>フリガナ　　<span style="color: red">必須</span></p>
        <input type="text" placeholder="セイ" style="width:30%" required>　　<input type="text" placeholder="メイ"
            style="width:30%" required>

            <p>電話番号(ハイフン無し)　　<span style="color: red">必須</span></p>
            <input type="text" placeholder="" style="width:60%" required>

            <p>住所　　<span style="color: red">必須</span></p>
            <input type="text" placeholder="" style="width:60%" required>

            <p>メールアドレス　　<span style="color: red">必須</span></p>
            <input type="text" placeholder="" style="width:60%" required>
    

    {{-- DEMO！！！！
                <form method="POST" name="fm">
                    @csrf
                    <a href="{{route ('getuser.post',['nm'=>'nm','id'=>'id','msg'=>'msg','os'=>'os','con'=>'con','url'=>'url'])}}"></a>
                    <button type="submit">送信</button> --}}

    {{-- POST用 --}}
    <input type="hidden" id="userIdProps" value="" name="id">

    </div>
    </div>
    </form>
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getuserid.js"></script>
</body>

</html>
