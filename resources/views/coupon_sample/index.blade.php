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
            <form method="GET" action="{{route('stamps.login')}}">
                <input type="hidden" value="{{$store}}" name="store">
                <input type="submit" value="ショップカードへ戻る"> 
            <input type="hidden" id="user" name="uid">
            </form>
        @else

       
                <h2 class="bene_title">あなたが利用できるクーポン</h2>

                @if (isset($cps[0]))
             
                    @foreach ($cps as $cp)
                    <form action="{{ route('coupon.view') }}" method="GET" >
                        <div class="benefits">
                            <button type="submit">
                                <div class="point_mark">{{ $cp['term_of_use_point'] }}</div>
                                <input type="hidden" name="couponId" value="{{ $cp['id'] }}">
                                <input type="hidden" name="img" value="{{ $cp['img'] }}">
                                <input type="hidden" name="name" value="{{ $cp['name'] }}">
                                <input type="hidden" name="exiry" value="{{ $cp['exiry'] }}">
                                <input type="hidden" name="detail" value="{{ $cp['detail'] }}">
                                {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                                <img src="{{ secure_asset('img/coupons/' . $cp['img']) }}" alt="img"
                                    class="bene_img">
                                <h4>{{ $cp['name'] }}</h4>
                                <p>{{ $cp['detail'] }}</p>

                            </button>
                            </div>
                            <input type="hidden" name="store" value="{{ $store }}">
                            <input type="hidden" value="{{$card_id}}" name="card_id">
                        </form>
                    
                    @endforeach
                   
                @else
                <form action="{{ route('coupon.view') }}" method="GET">
                    <button type="submit">
                    <div class="benefits">
                        <div class="point_mark">{{ $cps['term_of_use_point'] }}</div>
                        <input type="hidden" name="couponId" value="{{ $cps['id'] }}">
                        <input type="hidden" name="img" value="{{ $cps['img'] }}">
                        <input type="hidden" name="name" value="{{ $cps['name'] }}">
                        <input type="hidden" name="exiry" value="{{ $cps['exiry'] }}">
                        <input type="hidden" name="detail" value="{{ $cps['detail'] }}">
                        {{--  <input type="submit" value="GET！" class="submit_btn">  --}}
                        <img src="{{ secure_asset('img/coupons/' . $cps['img']) }}" alt="img" class="bene_img">
                        <h4>{{ $cps['name'] }}</h4>
                        <p>{{ $cps['detail'] }}</p>
                    </button>
                    </div>
                    <input type="hidden" id="user" name="uid">
                    <input type="hidden" name="store" value="{{ $store }}">
                    <input type="hidden" value="{{$card_id}}" name="card_id">
                    </form>
                @endif

         
        @endif

    </div>



    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{ secure_asset('js/getuserid.js') }}"></script>
    <script src="{{ secure_asset('js/jquery-1.9.0.min.js') }}" type="text/javascript"></script>

</body>

</html>
