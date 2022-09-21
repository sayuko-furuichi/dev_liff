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

    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('member.add')}}" method="POST">
        @csrf
    <div>
        <p>まる屋</p>
    </div>

    <div>
        <button type="submit">チャットに戻る</button>
    </div>
</form>
</div>
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
