<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     {{--  <link rel="stylesheet" href="{{ secure_asset('css/liff.css') }}">    --}}
    {{--  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">    --}}
    {{--  <link id="import-link" rel="import" href="./sub.html">  --}}
    <script src="https://unpkg.com/glottologist"></script> 
    <title>WELCOME</title>
</head>

<body bgcolor="#c0c0c0">

    <h1>home</h1>
    <p>Hello!!! world!!!! LINEMINI APP</p>

    <p>ようこそ！ <span id="displayNameField"> </span> さん</p>

    <div class="note">

        <p glot-model="note1"></p>
        <p glot-model="note2"></p>
    </div>
    </div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/home.js"></script>
</body>

</html>