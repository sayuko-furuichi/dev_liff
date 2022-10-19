<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/liff.css') }}"> --}}
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
    @if($credit===1)
    @csrf
    <p id="creditForm">クレジットカード情報入力</p>
    <table>
        <tr><td>カード番号</td>
    {{--  ここにカード番号入力フォームが生成されます  --}}
   <td><div id="number-form" class="payjs-outer"></div></td>
</tr>
</table>
    {{--  <!-- ここに有効期限入力フォームが生成されます -->  --}}
    <span>カード有効期限</span><div id="expiry-form" class="payjs-outer"></div>
    {{--  <!-- ここにCVC入力フォームが生成されます -->  --}}
    <span>セキュリティコード</span><div id="cvc-form" class="payjs-outer"></div>
    <span>カード名義氏名</span><input type="text" name="credit_name" id="credit_name" required>
    <button id="create_tkn">カードを照会する</button>
    <span id="token2"></span>

    @endif
    {{--  <p><input type="checkbox" name="member"> 追加情報を入力して会員登録する</p>  --}}
        <button type="submit">送信</button>
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
