<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{secure_asset('css/coupon.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coupon</title>
</head>
<body>
    @if (isset($non))
    <div>
        <p>利用できるクーポンがありません</p>
    </div>

    @else
    <div class="coupons">
        <form action="{{route('coupon.used')}}" method="POST">
            @csrf
            <div class="img_c">
            <img src="{{secure_asset('img/1.png')}}" alt="img" class="coupon_img">
        </div>
        <div class="text">
        <h1>COUPON TITLE</h1>
        <h2>有効期限 :~</h2>
    </div>
            {{--  <input type="hidden" name="user" value="{{$request->user}}">
            <input type="hidden" name="store" value="{{$request->store}}">
       <input type="hidden" name="couponId" value="{{$request->couponId}}">   --}}
       {{--  <img src="{{secure_asset('img/coupons/coupon.svg')}}" alt="クーポン" class="coupon_img">  --}}
            {{--  @if (session('used'))  --}}
           {{--  <img src="{{secure_asset('img/coupons/usedOn.svg')}}" alt="" class="used_img">   --}}
            {{--  @else  --}}
            {{--  <button type="submit"><img src="{{secure_asset('img/coupons/used.svg')}}" alt="used" class="used_img"></button>  --}}
            {{--  @endif  --}}
       
    </form>
    </div>
    @endif
    
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/coupon.js')}}"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
</body>
</html>