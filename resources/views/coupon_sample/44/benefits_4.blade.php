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
    @if (isset($request))
    <div class="coupons">
        <form action="{{route('coupon.used')}}" method="POST">
            @csrf
            <input type="hidden" name="user" value="{{$request['uid']}}">
            <input type="hidden" name="store" value="{{$request['store']}}">
       <input type="hidden" name="couponId" value="{{$request['couponId']}}"> <img src="{{secure_asset($request['img'])}}" alt="クーポン" class="coupon_img">
       <p>{{$request['name']}}</p>
       <p><span>有効期限：</span>{{$request['exiry']}}</p>
       <p><span>使用方法：</span>{{$request['detail']}}</p>
       @endif    
       @if (isset($used))
           <img src="{{secure_asset('img/coupons/usedOn.svg')}}" alt="" class="used_img"> 
           <form method="GET" action="{{route('stamps.login')}}">
           <input type="hidden" value="{{$store}}" name="store">
           <input type="submit" value="ショップカードへ戻る"> 
        </form>
            @else
            <button type="submit"><img src="{{secure_asset('img/coupons/used.svg')}}" alt="used" class="used_img"></button>
            @endif
    </form>
    </div>

    
    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="{{secure_asset('js/coupon.js')}}"></script>
    <script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
</body>
</html>
