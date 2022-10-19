<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/addmember.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>お客様情報入力</title>
</head>
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
    <form action="{{route('reserve.submit')}}" method="POST">
        @csrf
    @if (isset($request))
    <input type="hidden" name="store" value="{{$request->store}}">
<input type="hidden" name="dateTime" value="{{$request->dateTime}}">
<input type="hidden" name="courses[]" value="{{$request->courses[0]}}">
    @endif
    <img src="{{secure_asset('img/menu_bar/var_3.png')}}" alt="ながれ">
    <div class="note">
    {{-- name属性つける --}}

    <div class="item">
        <p class="sub_title">　名前　　<span class="must">必須</span></p>
        <input type="text" placeholder="姓"required name="sei" class="half_txt" pattern="^[^ 　0-9\$/_\[\]\t]+$">　<input type="text"
            placeholder="名" required name="mei" class="half_txt" pattern="^[^ 　0-9\$/_\[\]\t]+$">
    </div>
    <div class="item">
        <p class="sub_title">　ふりがな　　<span class="must">必須</span></p>
        <input type="text" placeholder="せい" required name="fSei" class="half_txt" pattern="^[ぁ-ん]{1,30}+$|^[ァ-ヶ]{1,30}+$">　<input type="text"
            placeholder="めい" required name="fMei" class="half_txt" pattern="^[ぁ-ん]{1,30}+$|^[ァ-ヶ]{1,30}+$">
    </div>
    <div class="item">
        <p class="sub_title">　電話番号(ハイフン無し)　　<span class="must">必須</span></p>
        <input type="text" placeholder="" required name="tel" class="txt" pattern="^[0-9]{8,14}+$">
    </div>
       
    @if($credit===1)
    <div class="item">
    <p id="creditForm" class="sub_title">　クレジットカード情報入力　　<span class="must">必須</span></p>
</div>
        <span>カード番号：</span>
    {{--  ここにカード番号入力フォームが生成されます  --}}
   <div id="number-form" class="payjs-outer"></div>


    {{--  <!-- ここに有効期限入力フォームが生成されます -->  --}}
    <span>カード有効期限：</span><div id="expiry-form" class="payjs-outer"></div>
    {{--  <!-- ここにCVC入力フォームが生成されます -->  --}}
    <span>セキュリティコード：</span><div id="cvc-form" class="payjs-outer"></div>
    <p>カード名義氏名：</p>
    <input type="text" name="credit_name" id="credit_name" required>
    {{--  <button >カードを照会する</button>  --}}
    <span id="token2" class="must"></span>
    <input type="hidden" id="credit_token" name="credit_token">
    @endif
    {{--  <p><input type="checkbox" name="member"> 追加情報を入力して会員登録する</p>  --}}
        <button type="submit" class="submit_btn" id="create_tkn">送信</button>
    </div>

    <input type="hidden" id="user" value="" name="id">
</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
    <script src="https://js.pay.jp/v2/pay.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{secure_asset('js/getclient.js')}}"></script>
</body>

</html>
