<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ secure_asset('css/lineDetail.css') }}">  
    {{--  <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}">    --}}
    {{--  <link id="import-link" rel="import" href="./sub.html">  --}}
    <script src="https://unpkg.com/glottologist"></script> 
    <title>WELCOME</title>
</head>

<body>

    <h1>SendMessage</h1>

    @if (isset($rtn))
    <p> {{$rtn}}</p>
    @endif
  
    <p>ようこそ！ <span id="displayNameField"> </span> さん</p>

    <p>入力したメッセージを 公式アカウントからあなたへ送信します</p>


    <form method="POST">
        @csrf

   {{--  <p> <input type="text" name="msg"> </p>
   <p> <input type="text" name="msg2"> </p>  --}}
   <input type="hidden" id="userIdProps" value="" name="id">
   <div class="line-bc">

    <div class="balloon6">
      <div class="faceicon">
        <img src="{{ secure_asset('img/default.png') }}" alt="def">
      </div>

      <div class="chatting">
        <div class="says">
          <p> <input type="text" name="msg" required></p>
        </div>
      </div>
      <td></td>
      <div class="chatting">
        <div class="says">
          <p> <input type="text" name="msg2" required></p>
        </div>
    </div>

    <div class="mycomment">
      <p>
       　　　　　
      </p>
      
    </div>
  </div>
</form>
</div>
<div align="center">
<a href="{{route ('send.send')}}"></a>
<button type="submit">自分に送信</button>
</div>
<p>公式アカウントへイベントを発信し、操作したユーザへ送信命令を出します</p>

    <div class="note">

        <p glot-model="note1"></p>
        <p glot-model="note2"></p>
    
    </div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script src="js/getuserid.js"></script> 
</body>

</html>