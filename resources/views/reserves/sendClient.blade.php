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
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
    <a href="{{route('member.mypage')}}">マイページ（サンプル用）</a>
    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('reserve.submit')}}" method="POST">
        @csrf
    <div>
        <p>名前　　<span style="color: red">必須</span></p>
        <input type="text" placeholder="姓" style="width:30%" required name="sei">　　<input type="text" placeholder="名"
            style="width:30%" required name="mei">
    </div>
    <div>
        <p>フリガナ　　<span style="color: red">必須</span></p>
        <input type="text" placeholder="セイ" style="width:30%" required name="fSei">　　<input type="text" placeholder="メイ"
            style="width:30%" required name="fMei">
    </div>
    <div>
        <p>電話番号(ハイフン無し)　　<span style="color: red">必須</span></p>
        <input type="text" placeholder="" style="width:60%" required name="tel">
    </div>
    <div>
        <p>住所　　<span style="color: red">必須</span></p>
        <input type="text" placeholder="" style="width:60%" required name="address">
    </div>
        <button type="submit">送信</button>
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
