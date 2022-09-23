<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/liff.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>まる屋</title>
</head>
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
    <h1>ご予約内容</h1>
    <a href="{{route('reserve.send')}}">お客様情報入力へ</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.send')}}" method="GET">
        @csrf
        <div>
        <p>日付</p>
        <p> 2022年4月5日(火) 12:00~ </p>
    </div>
    
    <div>
        <p>お支払い情報</p>
        <p><input type="radio" name="pay" value="genti"> 現地決済</p>
        <p><input type="radio" name="pay" value="kureka"> クレジットカード</p>
    </div>
    <input type="hidden" id="userIdProps" value="" name="id">
    <input type="submit" value="この内容で予約する">

</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getuserid.js"></script>
</body>

</html>
