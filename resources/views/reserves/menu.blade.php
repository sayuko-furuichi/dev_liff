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
<img src="{{secure_asset('img/menu_bar/var_1.png')}}" alt="メニュー">
    <a href="{{route('reserve.date')}}">日時選択へ</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.date')}}" method="GET">
        @csrf
        @if (isset($request))
        <input type="hidden" name="store" value="{{$request->store}}">
            {{--  <p>店舗ID：{{$request->store}}</p>  --}}
        @endif
      <table>
        <th>
        <tr>
           <img src="{{secure_asset('img/1.png')}}" alt="img"><input type="button" value="Aコース"name="course" class="btn"><td>Aコース</td>
        </tr>
    </th>
    <hr>
    <th>
        <tr>
            <img src="{{secure_asset('img/1.png')}}" alt="img"><input type="button" value="Bコース"name="course"><td>Aコース</td>
        </tr>
    </th>
    <hr>
    <th>
        <tr>
            <img src="{{secure_asset('img/1.png')}}" alt="img"><input type="button" value="Cコース"name="course"><td>Aコース</td>
        </tr>
    </th>
    <hr>
    </table>
    <div>
        <button type="submit">日時を選択する</button>
    </div>

    <input type="hidden" id="userIdProps" value="" name="id">
</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getuserid.js"></script>
</body>

</html>
