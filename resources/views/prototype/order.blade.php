<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ secure_asset('css/proOrder.css') }}">
    <meta name="viewport"
   content="width=320,
      height=480,
      initial-scale=1.0,
      minimum-scale=1.0,
      maximum-scale=2.0,
      user-scalable=yes" />

    <title>Document</title>
</head>
<header class="site-header">
    <h1 class="site-logo"><img src="images/logo.png" alt="WEBDESIGNDAY"></h1>
    <nav class="gnav">
        <ul class="gnav__menu">
            {{-- ページ内リンクを貼る --}}
            <li class="gnav__menu__item"><a href="">About</a></li>
            <li class="gnav__menu__item"><a href="">Works</a></li>
            <li class="gnav__menu__item"><a href="">Recruit</a></li>
            <li class="gnav__menu__item"><a href="">News</a></li>
            <li class="gnav__menu__item"><a href="">Contact</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="hero"><img src="images/hero.jpg" alt="hero"></div>
    <div class="content">
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>

        <table border="3">
            <thead>
                <tr style="background-color:#C0C0C0">
                    <th></th>
                    <th><a href="https://cloud.google.com/vision?hl=ja">google　vision　API</a>
                    </th>
                    <th><a href="https://docs.aws.amazon.com/ja_jp/rekognition/latest/dg/API_DetectText.html">AWS Amazon
                            Rekognition Image</a></th>
                    <th><a
                            href="https://azure.microsoft.com/ja-jp/services/cognitive-services/computer-vision/#features">Azure
                            Computer Vision</a></th>
                    <th><a href="https://www.bing.com/visualsearch">Bing visual search</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>日本語対応</td>
                    <td>
                        <font color="red">有り</font>
                    </td>
                    <td>無し</td>
                    <td>
                        <font color="red">有り</font>
                    </td>
                    <td>無し</td>
                </tr>
                <tr>
                    <td>料金</td>
                    <td>1万枚読み取って、約1850円/月<font color="red">(毎月1000枚まで無料)</font><br>
                    </td>
                    <td>1万枚読み取って、約1800円/月<br>
                    </td>
                    <td>1万枚読み取って、約1400円/月　※月額制も有り<br></td>
                    <td>1万枚読み取って、約1,150円/月<br></td>
                </tr>
                <tr>
                    <td>特徴</td>
                    <td><a href="https://cloud.google.com/vision/docs/pdf">PDF /
                            TIFF　にも対応可</a><br>サポート言語が多い<br>毎月、1000枚までは無料<a
                            href="https://cloud.google.com/vision/docs/pdf"><br></td>
                    <td>価格が、やや安い</td>
                    <td>日本語に対応している<br>JPEG,PNG,TIFF等にも対応</td>
                    <td>価格が安い</td>
                </tr>
                <tr>
                    <td>読み取り精度</td>
                    <td></td>
                    <td>/ ※性能を試す機能がありませんでした</td>
                    <td>/td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>
    <div class="container py-3">
        <div class="row">
          <div class="col-12 bg-dark text-white text-center">
          </div>
        </div>
        <div class="row pt-3 text-center text-white">
          <div class="col-9 main-content bg-primary">
            <p>main</p>
          </div>
          <div class="col-3">
            <div class="sidebar bg-success">
            <p>sidebar</p>
             </div>
          </div>
        </div>
        <div class="row pt-3">
          <div class="col-12 bg-dark text-white text-center">
           </div>
        </div>
      </div>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
    <script src="js/jquery-1.9.0.min.js" type="text/javascript"></script>
    <script src="js/protoOrder.js"></script>
</body>
<footer class="site-footer">
    <p class="copyright">@2017 WEBDESIGNDAY</p>
</footer>

</html>
