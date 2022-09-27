<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>まるや　流入経路設定</h1>
    <form action="{{route('addroute.add')}}" method="POST">
        @csrf
        <p>経路名：</p>
        <p><input type="text" name="name"></p>

        <input type="submit" value="追加">

    </form>
@if (isset($qrs))
<img src="{{$qrs['qr']}}" alt="">
<p>{{$qrs['url']}}</p>
@endif
</body>
</html>