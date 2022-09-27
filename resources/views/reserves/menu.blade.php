<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/menu.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>まる屋</title>
</head>
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
<img src="{{secure_asset('img/menu_bar/var_2.png')}}" alt="メニュー">
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
            <td> <img src="{{secure_asset('img/1.png')}}" alt="img" class="m_img"><input type="checkbox" value="Aコース"name="courses[]" class="btn">Aコース</td>
        </tr>
    </th>
    <hr>
    <th>
        <tr>
            <td><img src="{{secure_asset('img/1.png')}}" alt="img" class="m_img"><input type="checkbox" value="Bコース"name="courses[]" class="btn">Bコース</td>
        </tr>
    </th>
    <hr>
    <th>
        <tr>
            <td><img src="{{secure_asset('img/1.png')}}" alt="img" class="m_img"><input type="checkbox" value="Cコース"name="courses[]" class="btn">Cコース</td>
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
