<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/addmember.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>会員登録画面</title>
</head>
{{--  会員登録後、特別な表示と会員証画面へリダイレクトさせる  --}}
<body>
    <div class="note">
        @if(session('result'))
    <p>{{session('result')}} 会員画面に遷移します</p>
        @endif
    {{-- name属性つける --}}
    <form action="{{route('member.add')}}" method="POST">
        @csrf
    <div class="item">
        <p class="sub_title">　名前　　<span  class="must">必須</span></p>
        <input type="text" placeholder="姓"required name="sei" class="half_txt">　<input type="text" placeholder="名"
            required name="mei" class="half_txt">
    </div>
    <div  class="item">
        <p class="sub_title">　ふりがな　　<span  class="must">必須</span></p>
        <input type="text" placeholder="せい"  required name="fSei" class="half_txt">　<input type="text" placeholder="めい"
             required name="fMei" class="half_txt">
    </div>
    <div  class="item">
        <p class="sub_title">　電話番号(ハイフン無し)　　<span class="must">必須</span></p>
        <input type="text" placeholder=""  required name="tel" class="txt">
    </div>
    <div  class="item">
        <p class="sub_title">　住所　　<span  class="must">必須</span></p>
        {{--  <input type="text" placeholder=""  required name="address" class="txt">  --}}
        <select name="prefecture_id" size="1" required  placeholder="都道府県"  class="pre_txt">
            @foreach ($prefecture as $pre)
            <option value="{{$pre->id}}">{{$pre->prefecture}}</option>
            @endforeach
            </select>　<input type="text" placeholder="市区町村"required name="municipality" class="onethird_txt">　 <input type="text" placeholder="番地" required name="house_number" class="onethird_txt">
    </div>
    <div  class="item">
        <p class="sub_title">　メールアドレス　　<span class="must">必須</span></p>
        <input type="text" placeholder=""required name="email" class="txt">
    </div>
    <div  class="btn">
        <button type="submit" class="submit_btn">送信</button>
    </div>

    <input type="hidden" id="user" value="" name="userId">
    <input type="hidden"  value="{{$store_id}}" name="store_id">
</form>
</div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{secure_asset('js/devgetuserId.js')}}"></script>
</body>

</html>
