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
    <img src="{{secure_asset('img/menu_bar/var_3.png')}}" alt="ながれ">
    <a href="{{route('reserve.send')}}">お客様情報入力へ</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.send')}}" method="GET">
        @csrf
        <div>
            <p>店舗</p>
            <p><input type="hidden" name="store" value="{{$request->store}}"> {{$request->store}} 店</p>
        <p>日付</p>
        <p><input type="hidden" name="dateTime" value="{{$request->dateTime}}">  {{$request->dateTime}} </p>
        <p>コース</p>
        <p> <input type="hidden" name="courses[0]" value="{{$request->courses[0]}}"> {{$request->courses[0]}} </p>
    </div>
    
    <div>
        <p>お支払い情報</p>
        <p>合計(消費税込み) ***円</p>
        <p><input type="radio" name="pay" value="genti" required> 現地決済</p>
        <p><input type="radio" name="pay" value="kureka" required> クレジットカード</p>
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
