<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/submit.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>予約完了画面</title>
</head>
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
    <img src="{{secure_asset('img/menu_bar/var_4.png')}}" alt="">
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.cancel')}}" method="get">
        @csrf
        <div class="center">
            @if (isset($response))
                <p>{{$response}}</p>
            @endif
        <p>予約完了しました！ご来店をお待ちしております</p>
        <input type="hidden" value="{{$charge['id']}}" name="charge_id">
        <p>{{$charge['id']}}</p>
       <td><img src="{{secure_asset('img/1.png')}}" alt="ロゴマーク" width="25%"><p>まる屋</p></td>
    </div>
    <button type="submit">予約をキャンセルする</button>
</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getuserid.js"></script>
</body>

</html>
