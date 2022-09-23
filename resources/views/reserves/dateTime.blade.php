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
    <h1>希望日時選択</h1>
    <a href="{{route('reserve.confirm')}}">確認へ</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('member.add')}}" method="POST">
        @csrf
        <table border="3">
            <tr>
                <th>　　　　　　2022年 4月　　　　</th>
            </tr>
            <tr>
                <th></th>
                <th>1日</th>
                <th>2日</th>
                <th>3日</th>
                <th>4日</th>
            </tr>
            
            <tr>
                <th>10:00</th>
                <td>×</td>
                <td>×</td>
                <td>○</td>
                <td>×</td>
            </tr>
            <tr>
                <th>10:30</th>
                <td>×</td>
                <td>×</td>
                <td>○</td>
                <td>×</td>
            </tr>
            <tr>
                <th>11:00</th>
                <td>×</td>
                <td>×</td>
                <td>○</td>
                <td>×</td>
            </tr>
        </table>

    <input type="hidden" id="userIdProps" value="" name="id">
</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getuserid.js"></script>
</body>

</html>
