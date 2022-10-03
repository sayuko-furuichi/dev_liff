<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ secure_asset('css/couponIndex.css') }}">
    <title>獲得した特典クーポン</title>
</head>

<body>
    <div>

        @if (isset($notFound))
            <p>使用できるクーポンがありません</p>
            <a href="{{ route('stamps.login') }}">ショップカードに戻る</a>
        @else
            <form action="{{ route('coupon.view') }}" method="GET">
                <h2 class="bene_title">あなたが利用できるクーポン</h2>

                @if (isset($cps[0]))

                    @foreach ($cps as $cp)
                        <div class="benefits">
                            <div class="point_mark">{{ $cp['term_of_use_point'] }}</div>
                            <input type="hidden" name="couponId" value="{{ $cp['id'] }}">
                            {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                            <img src="{{ secure_asset($cp['img']) }}" alt="img" class="bene_img">
                            <h4>{{ $cp['name'] }}</h4>
                            <p>{{ $cp['detail'] }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="benefits">
                        <div class="point_mark">{{ $cps['term_of_use_point'] }}</div>
                        <input type="hidden" name="couponId" value="{{ $cps['id'] }}">
                        <input type="hidden" name="img" value="{{ $cps['img'] }}">
                        {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                        <img src="{{ secure_asset($cps['img']) }}" alt="img" class="bene_img">
                        <h4>{{ $cps['name'] }}</h4>
                        <p>{{ $cps['detail'] }}</p>
                    </div>
                @endif


                <input type="hidden" id="userIdProps" name="uid">
                <input type="hidden" name="store" value="{{ $store }}">
                <input type="submit" value="（仮）">
            </form>
        @endif
    
    </div>



    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{ secure_asset('js/getuserid.js') }}"></script>
    <script src="{{ secure_asset('js/jquery-1.9.0.min.js') }}" type="text/javascript"></script>

</body>

</html>
