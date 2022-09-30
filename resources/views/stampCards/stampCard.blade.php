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
                    <p class="limit">！ 有効期限：{{ $expiry }}</p>
                    <p class='f_subline'></p>

                </div>

                <div class='back'>
                    {{--  <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="b_logo">  --}}
                    {{--  <h1 class='b_headline'>まる屋</h1>  --}}
                    <span class='b_text'>CARD NUMBER: </span>
                    <p class="b_text" id="card_no">{{ $card_no }}</p>
                    <span class='b_text'>STORE ID: </span>
                    <p class="b_text">{{ $store_id }}</p>
                    <span class='b_text'>LINE USER ID: </span>
                    <p class="b_text">{{ $uid }}</p>
                    {{--  <p class='b_text'><br />text TEXT テキスト てきすと text TEXT テキスト てきすと<br />text TEXT テキスト てきすと</p>  --}}
                    {{--  <button class='b_button'><span>Buy now</span></button>  --}}
                </div>

            </div>

            {{--  <div class='r_wrap'>  --}}

            {{--  <div class='b_round'></div>  --}}
            {{--  <div class='s_round'>  --}}
            {{--  <div class='s_arrow'></div>  --}}
            {{--  </div> --}}
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

            <p class="get_points"> ポイント総数：{{ $points }}<span id="points" class="get_points"></span></p>
            @if (isset($getPoints))
                <p class="get_points">{{ $getPoints }} ポイントゲットしました！！</p>
            @endif
            {{--  <input type="submit" value="更新">  --}}
        </div>
        {{--  <p>{{$store}}</p>
        <p>{{$uid}}</p>  --}}
        <input type="hidden" id="user_id" name="uid">
    </form>
    <h2 class="bene_title">ポイントで獲得できる特典</h2>
    <div class="benefits">
       
        <div class="bene_item">
            <h3>4ポイント</h3>
            <img src="{{ secure_asset('img/1.png') }}" alt="img" class="bene_img">
            <h4>お好きなドリンク 1杯無料！</h4>
            <p>テキスト　テキスト</p>

        </div>
        <div class="bene_item">
            <h3>8ポイント<h3>
                    <img src="{{ secure_asset('img/1.png') }}" alt="img" class="bene_img">
                    <h4>お好きなそば 1杯無料！</h4>
                    <p>テキスト　テキスト</p>

        </div>
        <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="{{ secure_asset('js/getstamps.js') }}"></script>
        <script src="{{ secure_asset('js/jquery-1.9.0.min.js') }}" type="text/javascript"></script>
</body>

</html>
