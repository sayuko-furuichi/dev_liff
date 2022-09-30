<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coupon</title>
</head>
<body>
    <div>
        <img src="{{secure_asset('img/coupon/coupon.svg')}}" alt="クーポン">
        <img src="{{secure_asset('img/coupon/coupon.svg')}}" alt="クーポン">
    </div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/coupon.js')}}"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
</body>
</html>