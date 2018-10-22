<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hatachi Tobira</title>
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <header id="myHeader">
        <div class="bx_header">
            <div class="hd_left">
                <nav class="navbar navbar-expand-lg navbar-light flex-column">
                    <h1 class="logo navbar-brand">
                        <a href="/">
                            <p>マイテーマ、探そ。</p>
                            <img src="{{ asset('image/top/logo.png') }}" alt="">
                        </a>
                    </h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('about')}}">ABOUT</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    マイテーマを探す
                                </a>
                                <div class="dropdown-menu" >
                                    <a class="dropdown-item" href="{{ url('search-category')}}">マイテーマの種をみつける</a>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('search-category')}}">将来の選択肢を動画でみる</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('video')}}">将来の選択肢を動画でみる</a>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('video')}}">ハタチのトビラコラム</a> -->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('event')}}">イベントに参加する</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('column')}}">ハタチのトビラコラム</a>
                                </div>
                            </li>
                            @if(Auth::Guest())
                            <li class="nav-item">
                                <a class="nav-link show-modal-register" data-toggle="modal" data-target="#modal_register">新規登録</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('recruitment-staff')}}">企業採用担当の方</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#modal_login">ログイン</a>
                            </li>
                            <li class="nav-item"><a class="nav-link link-append show-modal-register" style="display: none;margin: 0px;" href="{{url('my-page')}}">マイテーマを見つける</a></li>
                            @endif
                            @if(Auth::User())
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('my-page')}}">マイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
                <!--/.nav-->
            </div>
            <!--/.hd_left-->
            <!--/.hd_right-->
        </div>
        <div class="hd_right">
            <a class="btn_find {{Auth::Guest() ? 'show-modal-register' : ''}}" href="{{url('my-page')}}">マイテーマを見つける</a>
        </div>
        <!--/.bx_header-->
    </header>
    <main>
        <div class="banner figure">
            <div id="carouseltop" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner row mx-auto" role="listbox">
                    <figure class="carousel-item active">
                        <img src="{{ asset('image/top/banner.png') }}">
                        <figcaption>
                            <!-- <img src="{{ asset('image/top/fig_banner.png') }}" alt=""> -->
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title">楽しもう、背伸びしない自分を。</p>
                            <p class="title">やりたいことって必要なの ？</p>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img src="{{ asset('image/top/banner-1.png') }}">
                        <figcaption>
                            <!-- <img src="{{ asset('image/top/fig_banner.png') }}" alt=""> -->
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title">楽しもう、背伸びしない自分を。</p>
                            <p class="title">やりたいことって必要なの ？</p>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img src="{{ asset('image/top/banner-2.png') }}">
                        <figcaption>
                            <!-- <img src="{{ asset('image/top/fig_banner.png') }}" alt=""> -->
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title">楽しもう、背伸びしない自分を。</p>
                            <p class="title">やりたいことって必要なの ？</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <a class="scroll" href="#">SCROLL</a>
        </div>
        <div class="image-top row">
            <div class="img-size">
                <img src="{{ asset('image/top/image-slide-1.png') }}" class="img-detail">
            </div>
            <div class="img-size">
                <img src="{{ asset('image/top/image-slide-2.png') }}" class="img-detail">
            </div>
            <div class="img-size">
                <img src="{{ asset('image/top/image-slide-3.png') }}" class="img-detail">
            </div>
            <div class="img-size">
                <img src="{{ asset('image/top/image-slide-4.png') }}" class="img-detail">
            </div>
            <div class="img-size">
                <img src="{{ asset('image/top/image-slide-5.png') }}" class="img-detail">
            </div>
        </div>
        <div class="content top">
            <div class="container content-1">
                <div class="content-title">
                    <p class="content-1-title">何が起きるかわからない</p>
                    <p class="content-1-title">5年後に悩むのは、</p>
                    <p class="content-1-title">もうやめない ？</p>
                </div>
                <div class="content-1-content">
                    <div class="cb-path"></div>
                    
                    <div class="text-my-theme ">
                        <p class="text-detail">学校と社会をつなぐ"ハタチのトビラ"は、将来の選択肢に触れ、マイテーマを探すきっかけを提供します</p>
                    </div>
                    
                    <div class="cb-path last"></div>
                    
                    <div class="text-my-theme">
                        <p class="text_detail_title">WHAT IS マイテーマ</p>
                        <p class="text-detail">マイテーマとは、自分の興味と意志からつくられる「私が、探求したいこと」です。誰にでも見出せるマイテーマは、変化していくものでありながら、今と未来をより充実させるための行動指針となっていきます。</p>
                    </div>
                    
                    <div class="cb-path"></div>
                </div>
                
            </div>
            <div class="movie-top-1">
                <div class="container">
                    <p class="movie-top-title">Movie</p>
                    <p class="movie-top-description">コンセプトムービー</p>
                    <div class="corner-wrapper video">
                        <div class="video-list">
                            <?php $counter = 0; ?>
                            @foreach($results_1 as $result)
                                @if(isset($result->items[0]) && $counter == 0)
                                <?php $counter++; ?>
                                <div class="video-detail">
                                    <div class="wrapper">
                                        <div class="thump">
                                            <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                            </div>
                                            <a href="#">
                                                <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe> -->
                    </div>
                </div>
            </div>
            <div class="movie-top-2 row">
                <div class="container">
                    <div class="col-md-2 col-sm-12 col-xs-12row">
                        <p class="text-vertical">探す3つの理由</p>
                        <p class="text-vertical last">マイテ<span>ー</span>マを</p>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-1.png') }}"></p>
                            <p class="text-tittle">01</p>
                            <p class="movie_image_description">大学生活をはじめ、今をより充実させるための行動が定まる</p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-2.png') }}"></p>
                            <p class="text-tittle">02</p>
                            <p class="movie_image_description">マイテーマを探す経験が、個性を際立たせる</p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-3.png') }}"></p>
                            <p class="text-tittle">03</p>
                            <p class="movie_image_description">人生100年時代でのキャリア選択や就活の指針に</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="movie-top-3">
                <div class="container">
                    <div class="content-tile-movie">
                        <p class="text-vertical-1 last"><span>マイテ</span><span class="vertical">ー</span><span>マ</span>の</p>
                        <p class="text-vertical-1">探し方</p>
                    </div>
                    <div class="cb-path cb-path-black"></div>
                    <div class="content-row">
                        <div class="col-md-12">
                            <p class="text-title-3">私の興味からヒントを得る</p>
                        </div>
                        <div class="row">
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=1') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-1.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=2') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-2.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=3') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-3.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=4') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-4.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=5') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-5.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=6') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-6.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=7') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-7.png') }}" alt=""></a>
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category?search=8') }}"><img class="img-cat" src="{{ asset('image/top/img-cate-8.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="container movie-top-4">
                <div class="cb-path"></div>
                <p class="movie-top-text">将来の選択肢から探す</p>
                <p class="movie-top-descroption">多様な仕事現場の働く1日に学生が密着した映像から、マイテーマの種をみつけよう</p>
                <div class="col-md-10 video-detail row">
                    <div class="col-md-8">
                        <div class="corner-wrapper video movie-1">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_1 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie">
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_1 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_1 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a href="{{url('video')}}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('image/top/arrow-1.png') }}" >
                </a>
            </div>

            <div class="container movie-top-4 content-2">
                <div class="cb-path"></div>
                <p class="movie-top-text">ロールモデルから探す</p>
                <p class="movie-top-descroption">多様なロールモデルのマイテーマに沿った生き方から、マイテーマの種をみつけよう</p>
                <div class="col-md-10 video-detail row">
                    <div class="col-md-8">
                        <div class="corner-wrapper video movie-1">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_2 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie">
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_2 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                <?php $counter = 0; ?>
                                @foreach($results_2 as $result)
                                    @if(isset($result->items[0]) && $counter == 0)
                                    <?php $counter++; ?>
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a href="{{ url('video') }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('image/top/arrow-1.png') }}">
                </a>
            </div>
            <div class="container movie-top-4 content-2">
                <div class="cb-path"></div>
                <p class="movie-top-text">イベントに参加する</p>
                <div class="event">
                    <p class="movie-top-descroption">多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう</p>
                            
                </div>
                <a href="{{ url('event') }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('image/top/arrow-1.png') }}" >
                </a>
            </div>
            <div class=" content-last">
                <div class="container">
                    <div class="cb-path"></div>
                    <p class="movie-top-text">ハタチのトビラコラム</p>
                    <p class="movie-top-descroption">マイテーマをみつけるノウハウ、イベントレポート、アラハタ世代の活躍を発信していきます</p>
                    <div class="content-text">
                        @forelse($columns as $key => $column)
                        <div class="item {{$key > 0 ? 'second' : ''}}">
                            <div class="text-category {{ $column->type == 1 ? 'last' : ''}}">{{ $column->type == 1 ?'コラム' :'インタビュー'}}</div>
                            <div class="wrapper">
                                <div class="icon">
                                    <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                        @php $image='image/column/'.$column->image; @endphp
                                        <img class="image" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}" alt="{{$image}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{ $column->favorite == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i></p>
                                    <p class="text-title">{{$column->title}}</p>
                                    <p class="category-aa">&nbsp;&nbsp;{{$column->category_name}}</p>
                                    <p class="text-date">{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                            <h4 class="data-not-found">Data not found</h4>
                        @endforelse
                        
                        <a href="{{ url('column') }}">
                            <span class="more-detail ">MORE</span>
                            <img src="{{ asset('image/top/arrow-1.png') }}" >
                        </a>
                    </div>
                </div>
            </div>
            <div class="container button-link">
                <a class="link-my-page {{Auth::Guest() ? "show-modal-register" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>
            </div>
        </div>
        <div id="modal_video" class="modal fade modal_register" role="dialog">
            <div class="modal-dialog" style="margin-top:150px">
                <div class="modal-content" style="width: 515px;border-radius: 13px;">
                    <div class="modal-body" style="text-align:center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="panel-body">
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        @include('includes.footer')
        @include('includes.login') 
    </main>

    <!-- <script src="{{asset('carosel/js/owl.carousel.js')}}"></script> -->
    <script type="text/javascript" charset="utf-8" async defer>
        var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;
        if (window.innerWidth > 993) {
            window.onscroll = function() { myFunction() };

            // Get the header

            // Get the offset position of the navbar

            // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("fixed");
                    $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
                    $('.navbar-nav.mr-auto').removeClass('flex-column');
                    $('.nav-link.link-append').css('display','block');
                } else {
                    header.classList.remove("fixed");
                    $('.bx_header .navbar-nav.mr-auto .link-a').remove();
                    $('.navbar.navbar-expand-lg.navbar-light').addClass('flex-column');
                    $('.navbar-nav.mr-auto').addClass('flex-column');
                    $('.nav-link.link-append').css('display','none');
                }

            }
        }

        if (window.innerWidth < 993) {
            header.classList.add("fixed");
            window.onscroll = function() {
                if (window.pageYOffset > sticky) {
                $("body").css('padding-top','100px');}
            };
            $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
            $('.navbar-nav.mr-auto').removeClass('flex-column');
            $('.bx_header .navbar-nav.mr-auto').append('<li class="nav-item"><a class="nav-link link-append" href="{{url("my-page")}}">マイテーマを見つける</a></li>');
            $('.bx_header .navbar-nav.mr-auto').css('align-items','flex-start');
            $('.bx_header .navbar-nav.mr-auto').css('font-weight','bold');
            $('.bx_header .nav-item').addClass('aaaafixed');
            $('.banner.figure').append('<a class="link-my-page {{Auth::Guest() ? "show-modal-register" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>');


            $('.dropdown').on('show.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
              });

              // Add slideUp animation to Bootstrap dropdown when collapsing.
            $('.dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
            });

            $('.image-top.row').addClass('owl-carousel owl-theme');
            
            $('.owl-carousel').owlCarousel({
                margin: 10,
                loop: false,
                responsive: {
                  0: {
                    items: 2
                  },
                  600: {
                    items: 2
                  },
                  1000: {
                    items: 3
                  }
                }
              });
           
        }
        $(document).ready(function() {
            $(document).on('click','.video .video-list .browse-details', function(e){
                e.preventDefault();
                var idvideo = $(this).data('id');
                var src = $(this).data('src');
                $('#modal_video .panel-body').html(src);
                $('#modal_video').modal('show');
            });

            $(document).on('click','.content-last .icon-favorior .fa-heart-o', function(e) {
                e.stopPropagation();
                var idevent = $(this).data('id');
                var user = $(this).data('user');
                var _this = $(this);
                if (user == '') {
                    $html = '';
                        $html +='<div class="form-group code-top">';
                            $html +='<div class="col-md-5">';
                            $html +='<p class="title-register">動画やイベント、あなたの興味のあるものを貯めて、マイテーマを作っていこう！</p>';
                            $html +='</div>';
                            $html +='<img src="{{ asset("image/picture1.png") }}">';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                                $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                            $html +='<div class="col-md-10 col-md-offset-1" style="text-align: left;">';
                                $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                                $html +='<label class="lblcheckbox"><a class="link-redirect" href="/private-polisy">利用規約</a> と <a class="link-redirect" href="/private-polisy">プライバシーポリシー</a> に同意する </label>';
                            $html +='</div>';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                            $html +='<div class="col-md-12">';
                                $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
                            $html +='</div>';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                            $html +='<div class="col-md-12">';
                                $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
                            $html +='</div>';
                        $html +='</div>';
                        $('#modal_register').find('.panel-body').html($html);
                        $('#modal_register').modal('show');
                }else {
                    $.ajax({
                        url : '{{route("column.favorite")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            column_id : idevent,
                            user_id: user
                        },
                        success : function (result){
                            if (result == 'ok') {
                                _this.addClass('liked');
                                _this.css('color','pink');
                            }else {
                                _this.removeClass('liked');
                                _this.css('color','#c3c2c2');
                            }
                        }   
                   })
                }
            })

            $(document).on('click','.movie-top-4 .event .fa.fa-heart-o',function(e){
                e.stopPropagation();
                var idevent = $(this).data('id');
                var user = $(this).data('user');
                var _this = $(this);
                if (user == '') {
                    $html = '';
                        $html +='<div class="form-group code-top">';
                            $html +='<div class="col-md-5">';
                            $html +='<p class="title-register">動画やイベント、あなたの興味のあるものを貯めて、マイテーマを作っていこう！</p>';
                            $html +='</div>';
                            $html +='<img src="{{ asset("image/picture1.png") }}">';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                                $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                            $html +='<div class="col-md-10 col-md-offset-1" style="text-align: left;">';
                                $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                                $html +='<label class="lblcheckbox"><a class="link-redirect" href="/private-polisy">利用規約</a> と <a class="link-redirect" href="/private-polisy">プライバシーポリシー</a> に同意する </label>';
                            $html +='</div>';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                            $html +='<div class="col-md-12">';
                                $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
                            $html +='</div>';
                        $html +='</div>';
                        $html +='<div class="form-group">';
                            $html +='<div class="col-md-12">';
                                $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
                            $html +='</div>';
                        $html +='</div>';
                        $('#modal_register').find('.panel-body').html($html);
                        $('#modal_register').modal('show');
                }else {
                    $.ajax({
                        url : '{{route("event.favorite")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            video_id : idevent,
                            user_id: user
                        },
                        success : function (result){
                            if (result == 'ok') {
                                _this.addClass('liked');
                                _this.css('color','pink');
                            }else {
                                _this.removeClass('liked');
                                _this.css('color','#d2cfcf');
                            }
                        }   
                   })
                }

            })
        })
    </script>
</body>
</html>
