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
        @for ( $i=0 ; $i < count($cards); $i++)
        {{--  先頭だったら  --}}
        @if ($cards[$i]->id == $first->id)
        <li id="carousel__slide{{$first->id}}"
            tabindex="0"
            class="carousel__slide">
            <div class='container'>

                <div class='flip_box'>
    
                    <div class='front'>
                        <div class="store">
                            <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="f_logo">
                            <p class='f_headline'>まる屋</p>
                        </div>
                        <div>
                            <img src="{{ secure_asset('img/stamps/card_8.svg') }}" alt="スタンプ枠" class="stamp_line">
                            {{--  <p class='f_title'>stamp CARD</p>  --}}
                        </div>
                        <p class="limit">！ 有効期限：{{ $cards[$i]->expiry }}</p>
                        {{--  <p class='f_subline'></p>  --}}
    
                    </div>
    
                    <div class='back'>
                        {{--  <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="b_logo">  --}}
                        {{--  <h1 class='b_headline'>まる屋</h1>  --}}
                        <span class='b_text'>CARD NUMBER: </span>
                        <p class="b_text" id="card_no">{{ $cards[$i]->card_no }}</p>
                        <span class='b_text'>STORE ID: </span>
                        <p class="b_text">{{ $cards[$i]->store_id }}</p>
                        <span class='b_text'>LINE USER ID: </span>
                        <p class="b_text">{{ $cards[$i]->uid }}</p>

                    </div>
    
                </div>
    
            </div>
          <div class="carousel__snapper">
            <a href="#carousel__slide{{$last->id}}"
               class="carousel__prev">Go to last slide</a>
            <a href="#carousel__slide{{$cards[$i+1]->id}}"
               class="carousel__next">Go to next slide</a>
          </div>
        </li>

       

        {{--  最後の要素だったら  --}}
        @elseif ($cards[$i]->id == $last->id)
        <li id="carousel__slide{{$last->id}}"
            tabindex="0"
            class="carousel__slide">
            <div class='container'>

                <div class='flip_box'>
    
                    <div class='front'>
                        <div class="store">
                            <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="f_logo">
                            <p class='f_headline'>まる屋</p>
                        </div>
                        <div>
                            <img src="{{ secure_asset('img/stamps/card_8.svg') }}" alt="スタンプ枠" class="stamp_line">
                            {{--  <p class='f_title'>stamp CARD</p>  --}}
                        </div>
                        <p class="limit">！ 有効期限：{{ $cards[$i]->expiry }}</p>
                        {{--  <p class='f_subline'></p>  --}}
    
                    </div>
    
                    <div class='back'>
                        {{--  <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="b_logo">  --}}
                        {{--  <h1 class='b_headline'>まる屋</h1>  --}}
                        <span class='b_text'>CARD NUMBER: </span>
                        <p class="b_text" id="card_no">{{ $cards[$i]->card_no }}</p>
                        <span class='b_text'>STORE ID: </span>
                        <p class="b_text">{{ $cards[$i]->store_id }}</p>
                        <span class='b_text'>LINE USER ID: </span>
                        <p class="b_text">{{ $cards[$i]->uid }}</p>
                        {{--  <p class='b_text'><br />text TEXT テキスト てきすと text TEXT テキスト てきすと<br />text TEXT テキスト てきすと</p>  --}}
                        {{--  <button class='b_button'><span>Buy now</span></button>  --}}
                    </div>
    
                </div>
    
            </div>
          <div class="carousel__snapper">
            {{--  {{$i-1}}  --}}
            <a href="#carousel__slide{{$cards[$i-1]->id}}"
               class="carousel__prev">Go to last slide</a>
            <a href="#carousel__slide{{$first->id}}"
               class="carousel__next">Go to next slide</a>
          </div>
        </li>
        {{--  {{$i+1}}  --}}
       @else

        <li id="carousel__slide{{$cards[$i]->id}}"
            tabindex="0"
            class="carousel__slide">
            <div class='container'>

                <div class='flip_box'>
    
                    <div class='front'>
                        <div class="store">
                            <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="f_logo">
                            <p class='f_headline'>まる屋</p>
                        </div>
                        <div>
                            <img src="{{ secure_asset('img/stamps/card_8.svg') }}" alt="スタンプ枠" class="stamp_line">
                            {{--  <p class='f_title'>stamp CARD</p>  --}}
                        </div>
                        <p class="limit">！ 有効期限：{{ $cards[$i]->expiry }}</p>
                        {{--  <p class='f_subline'></p>  --}}
    
                    </div>
    
                    <div class='back'>
                        {{--  <img src="{{ secure_asset('img/1.png') }}" alt="logo" class="b_logo">  --}}
                        {{--  <h1 class='b_headline'>まる屋</h1>  --}}
                        <span class='b_text'>CARD NUMBER: </span>
                        <p class="b_text" id="card_no">{{ $cards[$i]->card_no }}</p>
                        <span class='b_text'>STORE ID: </span>
                        <p class="b_text">{{ $cards[$i]->store_id }}</p>
                        <span class='b_text'>LINE USER ID: </span>
                        <p class="b_text">{{ $cards[$i]->uid }}</p>
                        {{--  <p class='b_text'><br />text TEXT テキスト てきすと text TEXT テキスト てきすと<br />text TEXT テキスト てきすと</p>  --}}
                        {{--  <button class='b_button'><span>Buy now</span></button>  --}}
                    </div>
    
                </div>
    
            </div>
          <div class="carousel__snapper">
            {{--  {{$i-1}}  --}}
            <a href="#carousel__slide{{$cards[$i-1]->id}}"
               class="carousel__prev">Go to last slide</a>
               {{--  {{$i+2}}  --}}
            <a href="#carousel__slide{{$cards[$i+1]->id}}"
               class="carousel__next">Go to next slide</a>
          </div>
        </li>
{{--  {{$i-1}}  --}}
@endif
        @endfor
    </ol> 
         
        {{--  <li id="carousel__slide{{$card->id}}"
            tabindex="0"
            class="carousel__slide">
            <div> {{$card->id}}</div>
          <div class="carousel__snapper">
            <a href="#carousel__slide{{$cards[]}}"
               class="carousel__prev">Go to last slide</a>
            <a href="#carousel__slide2"
               class="carousel__next">Go to next slide</a>
          </div>
        </li>  --}}
        {{--    --}}
        {{--  <li id="carousel__slide2"
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
        </li>  --}}
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