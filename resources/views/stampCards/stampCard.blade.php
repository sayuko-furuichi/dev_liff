<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/membersCard.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>スタンプラリー</title>
</head>

<body>

    <div class="note">
        <div>
            <p>まる屋</p>
        </div>
        <div class='container'>

            <div class='flip_box'>

                <div class='front'>
                    <div class="store">
                        <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="f_logo">
                        <p class='f_headline'>まる屋</p>
                    </div>
                    <div>
                        <img src="{{ secure_asset('img/stamps/card_8.svg') }}" alt="スタンプ枠" class="stamp_line">
                        {{--  <p class='f_title'>stamp CARD</p>  --}}
                    </div>
                    <p class="limit">！ 有効期限：*****</p>
                    <p class='f_subline'></p>

                </div>

                <div class='back'>
                    <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="b_logo">
                    {{--  <h1 class='b_headline'>まる屋</h1>  --}}
                    {{--  <p class='b_text'><br />text TEXT テキスト てきすと text TEXT テキスト てきすと<br />text TEXT テキスト てきすと</p>  --}}
                    {{--  <button class='b_button'><span>Buy now</span></button>  --}}
                </div>

            </div>

            {{--  <div class='r_wrap'>  --}}

            {{--  <div class='b_round'></div>  --}}
            {{--  <div class='s_round'>  --}}
            {{--  <div class='s_arrow'></div>  --}}
            {{--  </div>--}}
        </div>
      
     
    </div>
            <div class="return">
            </div>

    <div class="qr_btn">
        <button type="button" id="qr" class="bild_qr_btn">GET！<img src="{{ secure_asset('img/qr_syu.png') }}"
                alt="qrイメージ" class="qr_img"></button>
    </div>
    <form method="GET" id="forms">
        <div class="read_text">
            <p class="result"><button id="stamp" class="stamps" type="submit"></button></p>
            <p class="get_points"> ポイント総数：<span id="points" class="get_points"></span></p>
            @if (isset($getpoint))
                <p>{{$getpoint}} ポイントゲットしました！！</p>
            @endif
            {{--  <input type="submit" value="更新">  --}}
        </div>
        <input type="hidden" id="user_id" name="uid">
    </form>
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/getstamps.js"></script>
</body>

</html>
