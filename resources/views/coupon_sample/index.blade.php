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
            <input type="hidden" id="user" name="uid">
        @else
            <form action="{{ route('coupon.view') }}" method="GET">
                <h2 class="bene_title">あなたが利用できるクーポン</h2>

                @if (isset($cps[0]))

                    @foreach ($cps as $cp)
                    <input type="radio"  name="bene" class="radio_btn" id="beneInput.{{$cp['id']}}">
                        <div class="benefits">
                            <label for="beneInput.{{$cp['id']}}">
                            <div class="point_mark">{{ $cp['term_of_use_point'] }}</div>
                            <input type="hidden" name="couponId" value="{{ $cp['id'] }}">
                            <input type="hidden" name="img" value="{{ $cp['img'] }}">
                            <input type="hidden" name="name" value="{{ $cp['name'] }}">
                            <input type="hidden" name="exiry" value="{{ $cp['exiry'] }}">
                            <input type="hidden" name="detail" value="{{ $cp['detail'] }}">
                            {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                            <img src="{{ secure_asset('img/coupons/'.$cp['img']) }}" alt="img" class="bene_img">
                            <h4>{{ $cp['name'] }}</h4>
                            <p>{{ $cp['detail'] }}</p>
                        </label>
                        </div>
                    @endforeach
                @else
                    <div class="benefits">
                        <div class="point_mark">{{ $cps['term_of_use_point'] }}</div>
                        <input type="hidden" name="couponId" value="{{ $cps['id'] }}">
                        <input type="hidden" name="img" value="{{ $cps['img'] }}">
                        <input type="hidden" name="name" value="{{ $cps['name'] }}">
                        <input type="hidden" name="exiry" value="{{ $cps['exiry'] }}">
                        <input type="hidden" name="detail" value="{{ $cps['detail'] }}">
                        {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                        <img src="{{ secure_asset('img/coupons/'.$cps['img']) }}" alt="img" class="bene_img">
                        <h4>{{ $cps['name'] }}</h4>
                        <p>{{ $cps['detail'] }}</p>
                    </div>
                @endif


                <input type="hidden" id="user" name="uid">
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
