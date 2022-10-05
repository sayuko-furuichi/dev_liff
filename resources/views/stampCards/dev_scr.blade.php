<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{secure_asset('css/dev.css')}}">
    <title>Document</title>
</head>
<body>

    <h1>CSS-only Carousel</h1>

    <p>This carousel is created with HTML and CSS only.</p>
    
    <section class="carousel" aria-label="Gallery">
      <ol class="carousel__viewport">
        {{--  @foreach()  --}}
        <li id="carousel__slide1"
            tabindex="0"
            class="carousel__slide">
          <div class="carousel__snapper">
            <a href="#carousel__slide4"
               class="carousel__prev">Go to last slide</a>
            <a href="#carousel__slide2"
               class="carousel__next">Go to next slide</a>
          </div>
        </li>
        {{--    --}}
        <li id="carousel__slide2"
            tabindex="0"
            class="carousel__slide">
          <div class="carousel__snapper"></div>
          <a href="#carousel__slide1"
             class="carousel__prev">Go to previous slide</a>
          <a href="#carousel__slide3"
             class="carousel__next">Go to next slide</a>
        </li>
        <li id="carousel__slide3"
            tabindex="0"
            class="carousel__slide">
          <div class="carousel__snapper"></div>
          <a href="#carousel__slide2"
             class="carousel__prev">Go to previous slide</a>
          <a href="#carousel__slide4"
             class="carousel__next">Go to next slide</a>
        </li>
        <li id="carousel__slide4"
            tabindex="0"
            class="carousel__slide">
          <div class="carousel__snapper"></div>
          <a href="#carousel__slide3"
             class="carousel__prev">Go to previous slide</a>
          <a href="#carousel__slide1"
             class="carousel__next">Go to first slide</a>
        </li>
      {{--  </ol>
      <aside class="carousel__navigation">
        <ol class="carousel__navigation-list">
          <li class="carousel__navigation-item">
            <a href="#carousel__slide1"
               class="carousel__navigation-button">Go to slide 1</a>
          </li>
          <li class="carousel__navigation-item">
            <a href="#carousel__slide2"
               class="carousel__navigation-button">Go to slide 2</a>
          </li>
          <li class="carousel__navigation-item">
            <a href="#carousel__slide3"
               class="carousel__navigation-button">Go to slide 3</a>
          </li>
          <li class="carousel__navigation-item">
            <a href="#carousel__slide4"
               class="carousel__navigation-button">Go to slide 4</a>
          </li>
        </ol>  
      </aside>
      --}}
    </section>
<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
{{--  <script src="{{secure_asset('js/coupon.js')}}"></script>  --}}
<script src="{{secure_asset('js/jquery-1.9.0.min.js')}}" type="text/javascript"></script>
</body>
</html>