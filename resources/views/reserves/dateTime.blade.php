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
    <img src="{{secure_asset('img/menu_bar/var_1.png')}}" alt="">
    <a href="{{route('reserve.confirm')}}">確認へ</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.confirm')}}" method="GET">
    @if (isset($request))
      <input type="hidden" name="store" value="{{$request->store}}">
      <input type="hidden" name="courses[]" value="{{$request->courses[0]}}">
      <p>{{$request->courses[0]}}</p>
    @endif
  
        @csrf
        <table border="3">
            <th>
                <td>          </td>
                <td>2022年 4月</td>
            </th>
            <tr>
                <th>  日時  </th>
                <th>1日</th>
                <th>2日</th>
                <th>3日</th>
                <th>4日</th>
            </tr>
        
            <tr>
                <th>10:00</th>
                <td>×</td>
                <td>×</td>
                <td><input type="hidden" name="dateTime" value="2022-04-03 10:00"><button type="submit">○</button></td>
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
