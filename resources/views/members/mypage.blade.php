<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/card.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>まる屋メンバーズカード</title>
</head>

<body>

    <div class="note">
    {{-- name属性つける --}}
    <form action="{{route('member.add')}}" method="POST">
        @csrf
    <div>
        <p>まる屋</p>
    </div>
    <div class='container'>

        <div class='flip_box'>
      
          <div class='front' style="background-image: {{secure_asset('/img/1.png')}}">
            <p class='f_title'>Property insurance</p>
            <p class='f_subline'>Pack</p>
            <h1 class='f_headline'>Absolute safety</h1>
          </div>
      
          <div class='back'>
            <h1 class='b_headline'>まる屋</h1>
            <p class='b_text'>Comprehensive insurance of apartments<br />including structural elements, decoration,<br /> equipment, property and responsibility<br />to neighbors in the expanded package<br />insurance risks</p>
            <button class='b_button'><span>Buy now</span></button>
          </div>
      
        </div>
      
        <div class='r_wrap'>
      
          <div class='b_round'></div>
          <div class='s_round'>
            <div class='s_arrow'></div>
          </div>
        </div>
      
      </div>

    <div>
        <button type="submit">チャットに戻る</button>
    </div>
</div>

    </div>
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/card.js"></script>
</body>

</html>
