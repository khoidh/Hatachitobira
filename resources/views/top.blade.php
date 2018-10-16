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
                                <a class="nav-link" href="{{url('company-entrance')}}">企業採用担当の方</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#modal_login">ログイン</a>
                            </li>
                            @endif
                            @if(Auth::User())
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('my-page')}}">マイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
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
            <a class="btn_find" href="#">マイテーマを見つける</a>
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
            <!-- <img src="{{ asset('image/top/image-slide-2.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-3.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-4.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-5.png') }}" class="img-detail last"> -->
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
                        <p class="text-detail">ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。</p>
                    </div>
                    
                    <div class="cb-path last"></div>
                    
                    <div class="text-my-theme">
                        <p class="text_detail_title">WHAT IS マイテーマ</p>
                        <p class="text-detail">説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります</p>
                    </div>
                    
                    <div class="cb-path"></div>
                </div>
                
            </div>
            <div class="movie-top-1">
                <div class="container">
                    <p class="movie-top-title">Movie</p>
                    <p class="movie-top-description">コンセプトムービー</p>
                    <div class="corner-wrapper">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
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
                        <p class="text-vertical-1 last"><span>マイテーマ</span>の</p>
                        <p class="text-vertical-1">探し方</p>
                    </div>
                    <div class="cb-path cb-path-black"></div>
                    <div class="content-row">
                        <div class="col-md-12">
                            <p class="text-title-3">私の興味からヒントを得る</p>
                        </div>
                        <div class="row">
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-1.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-2.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-3.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-4.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-5.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-6.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-7.png') }}" alt="">
                            </div>
                            <div class="col-md-3 img-cat-sp">
                                <img class="img-cat" src="{{ asset('image/top/img-cate-8.png') }}" alt="">
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
                        <div class="corner-wrapper movie-1">
                            <iframe width="100%" height="270" left="0" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie">
                        <div class="corner-wrapper movie-2">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="corner-wrapper movie-2">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                </div>
                <a href="#">
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
                        <div class="corner-wrapper movie-1">
                            <iframe width="100%" height="270" left="0" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie">
                        <div class="corner-wrapper movie-2">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="corner-wrapper movie-2">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
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
                <p class="movie-top-descroption">多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう</p>
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
                        <div class="item">
                            <div class="text-category">インタビュー</div>
                            <div class="wrapper">
                                <div class="icon">
                                    <img src="{{ asset('image/top/img-event-1.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
                                    <p class="text-title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                                    <p class="category-aa">#カテゴリ</p>
                                    <p class="text-date">2018.3.20</p>
                                </div>
                            </div>
                        </div>

                        <div class="item second">
                            <div class="text-category last">コラム</div>
                            <div class="wrapper">
                                <div class="icon">
                                    <img src="{{ asset('image/top/img-event-1.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
                                    <p class="text-title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                                    <p class="category-aa">#カテゴリ</p>
                                    <p class="text-date">2018.3.20</p>
                                </div>
                            </div>
                        </div>
                        <div class="item second">
                            <div class="text-category">インタビュー</div>
                            <div class="wrapper">
                                <div class="icon">
                                    <img src="{{ asset('image/top/img-event-1.png') }}" alt="">
                                </div>
                                <div class="content">
                                    <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
                                    <p class="text-title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                                    <p class="category-aa">#カテゴリ</p>
                                    <p class="text-date">2018.3.20</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('column') }}">
                            <span class="more-detail ">MORE</span>
                            <img src="{{ asset('image/top/arrow-1.png') }}" >
                        </a>
                    </div>
                </div>
            </div>
            <div class="container button-link">
                <button type="button" class="btn btn-dark">マイテーマを見つける</button>
            </div>
        </div>
        @include('includes.footer')
        @include('includes.login') 
    </main>

    <!-- <script src="{{asset('carosel/js/owl.carousel.js')}}"></script> -->
    <script type="text/javascript" charset="utf-8" async defer>
        if (window.innerWidth > 993) {
            window.onscroll = function() { myFunction() };

        }
        // Get the header
        var header = document.getElementById("myHeader");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("fixed");
                $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
                $('.navbar-nav.mr-auto').removeClass('flex-column');
            } else {
                header.classList.remove("fixed");
                $('.navbar.navbar-expand-lg.navbar-light').addClass('flex-column');
                $('.navbar-nav.mr-auto').addClass('flex-column');
            }

        }

        if (window.innerWidth < 993) {
            header.classList.add("fixed");
            $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
            $('.navbar-nav.mr-auto').removeClass('flex-column');
            $('.bx_header .navbar-nav.mr-auto').append('<li class="nav-item"><a class="nav-link link-append" href="{{url("my-page")}}">マイテーマを見つける</a></li>');
            $('.bx_header .navbar-nav.mr-auto').css('align-items','flex-start');
            $('.bx_header .navbar-nav.mr-auto').css('font-weight','bold');
            $('.bx_header .nav-item').addClass('aaaafixed');
            $('.banner.figure').append('<a class="link-my-page" href="{{url("my-page")}}">マイテーマを見つける</a>');


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
    </script>
</body>
</html>
