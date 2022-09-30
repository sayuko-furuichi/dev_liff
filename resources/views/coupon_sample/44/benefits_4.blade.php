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
    <div class="coupons">
        <form action="{{route('coupon.used')}}" method="POST">
            <input type="hidden" name="uid" value="{$request->uid}">
            <input type="hidden" name="storeId" value="{$request->storeId}">
       <input type="hidden" name="couponId" value="{$request->couponId}"> <img src="{{secure_asset('img/coupons/coupon.svg')}}" alt="クーポン" class="coupon_img">
    </form>
        <button type="submit"><img src="{{secure_asset('img/coupons/used.svg')}}" alt="used" class="used_img"></button>
    </div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/coupon.js')}}"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
</body>
</html>