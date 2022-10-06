<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css/membersCard.css') }}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('css/reset.css') }}"> --}}
    {{-- <link id="import-link" rel="import" href="./sub.html"> --}}
    <script src="https://unpkg.com/glottologist"></script>
    <title>ショップカード</title>
</head>

<body>

    <div class="note">

        <section class="carousel" aria-label="Gallery">
            <ol class="carousel__viewport">
              {{--  @foreach()  --}}
              @for ( $i=0 ; $i <= count($cards)-1 ; $i++)

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
                              <div class="stamp_box">
                                @for ( $n=1 ;  $n<= $cards[$i]->now_points ; $n++)
                                @if($n==$cards[$i]->max_points)
                                <img src="{{ secure_asset('img/stamps/goal.svg') }}" alt="goalスタンプ枠" class="stamp_line">
                                @else
                                <img src="{{ secure_asset('img/stamps/empty_stampC.svg') }}" alt="スタンプ枠" class="stamp_line">
                                @endif
                                {{--  5の倍数の時改行する  --}}
                                @if($n % 5 === 0)
                              </div>
                              <div class="stamp_box">
                                @endif
                                @endfor   
                                  {{--  <p class='f_title'>stamp CARD</p>  --}}
                              </div>
                              <p class="limit">！ 有効期限：{{ $cards[$i]->expiry }}</p>
                              {{--  <p class='f_subline'></p>  --}}
          
                          </div>
          {{--  回転版の裏。無くてもいいかも  --}}
                          <div class='back'>
                              <span class='b_text'>CARD NUMBER: </span>
                              <span class='b_text'>STORE ID: </span>
                              <p class="b_text">{{ $cards[$i]->store_id }}</p>
                              <span class='b_text'>LINE USER ID: </span>
                              <p class="b_text">{{ $cards[$i]->uid }}</p>

                          </div>
          
                      </div>
          
                  </div>
                  
    <div class="read_text">
        
        <p class="get_points">{{$cards[$i]->number}} / {{$last->number}}</p>
        <p class="get_points">  {{$cards[$i]->now_points}} / {{$cards[$i]->max_points}} </p>
        <p class="get_points"> ポイント総数：<span id="total_p" class="get_points">{{ $last->points }}</span></p>
        @if (isset($getPoints))
            <p class="get_points">{{ $getPoints }} ポイントゲットしました！！</p>
        @endif
        @if (isset($new))
            <p>{{$new}} !!</p>
        @endif
        {{--  <input type="submit" value="更新">  --}}
    </div>

                  {{--  先頭だったら  --}}
    @if ($cards[$i]->id == $first->id)
                <div class="carousel__snapper">
                  <a href="#carousel__slide{{$last->id}}"
                     class="carousel__prev">Go to last slide</a>
                  <a href="#carousel__slide{{$cards[$i+1]->id}}"
                     class="carousel__next">Go to next slide</a>
                </div>
              </li>
      
             
      
              {{--  最後の要素だったら  --}}
              @elseif ($cards[$i]->id == $last->id)
          
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
         
          </section>


    </div>
    <div class="qr_btn">
        <button type="button" id="qr" class="bild_qr_btn"><img src="{{ secure_asset('img/qr_syu.png') }}"
                alt="qrイメージ" class="qr_img"><br>GET！</button>
    </div>

    {{--  <p>{{$store}}</p>
        <p>{{$uid}}</p>  --}}

    <hr>
    <form action="{{ route('coupon.index') }}" method="GET">
        <div class="i_btn">
        <input type="submit" value="獲得した特典チケットを見る" class="input_btn">
    </div>
        {{--  表示だけにして、別ページでクーポン表示  --}}
        <h2 class="bene_title">ポイントで獲得できる特典</h2>
    @if (isset($cps))
    @foreach ($cps as $cp)
    <div class="benefits">

        <input type="hidden" name="cps[]" value="{{ $cp }}">
        <div class="point_mark">{{ $cp->term_of_use_point }}</div>
        <img src="{{ secure_asset('img/coupons/' . $cp->img) }}" alt="img" class="bene_img">

        <h4>{{ $cp->name }}</h4>
        <p>{{ $cp->detail }}</p>
    </div>
@endforeach

    @elseif(isset($cp))
    <div class="benefits">

        <input type="hidden" name="cps[]" value="{{ $cp }}">
        <div class="point_mark">{{ $cp->term_of_use_point }}</div>
        <img src="{{ secure_asset('img/coupons/' . $cp->img) }}" alt="img" class="bene_img">

        <h4>{{ $cp->name }}</h4>
        <p>{{ $cp->detail }}</p>
    </div>
    @else
    <p>--獲得できる特典がありません--</p>

    @endif

        <hr>
        <div class="info">
            <h2>ご利用案内</h2>
            <pre>
    - 来店1回ごとに1ポイント付与されます。
    - 1日に複数回来店されてもポイントは1ポイントのみ付与されますので、ご了承ください。
    - 不正利用が発覚した場合は、これまでに獲得したポイントなどがすべて無効になる場合があります。
    - text　TEXT　テキスト　てきすと
    - text　TEXT　テキスト　てきすと
</pre>
        </div>

        <input type="hidden" id="card_no" value="{{$last->id}}">
        <input type="hidden" id="user_id" name="uid">
        <input type="hidden" name="store" value="{{ $cards[0]->store_id }}">
        {{--  <input type="hidden" name="points" value="{{ $cards[$i]->points }}">  --}}
    </form>

    <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ secure_asset('js/getstamps.js') }}"></script>
    <script src="{{ secure_asset('js/jquery-1.9.0.min.js') }}" type="text/javascript"></script>
</body>

</html>
