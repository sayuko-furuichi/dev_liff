<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>獲得した特典クーポン</title>
</head>

<body>
    <div>
        <h2 class="bene_title">ポイントで獲得できる特典</h2>
        <form action="{{ route('coupon.index') }}" method="GET">
            @foreach ($cps as $cp)
                <div class="benefits">
                    <input type="hidden" name="couponId" value="{{ $cp->id }}">
                    <input type="submit" value="GET！" class="submit_btn">
                    <img src="{{ secure_asset('img/1.png') }}" alt="img" class="bene_img">
                    <h4>{{ $cp->name }}</h4>
                    <p>テキスト　テキスト</p>
                </div>
            @endforeach
            <input type="hidden" id="userIdProps" name="uid">
        </form>
    </div>



    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{ secure_asset('js/getuserid.js') }}"></script>
    <script src="{{ secure_asset('js/jquery-1.9.0.min.js') }}" type="text/javascript"></script>

</body>

</html>
