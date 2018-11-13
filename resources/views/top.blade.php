<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hatachi Tobira</title>
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slick/slick.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/slick/slick.min.js') }}"></script>
</head>
<body style="overflow-x: hidden;">
    
    <header id="myHeader">
        <div class="bx_header">
            <div class="hd_left">
                <nav class="navbar navbar-expand-lg navbar-light flex-column">
                    <h1 class="logo navbar-brand">
                        <a href="/">
                            <p>ベータ版</p>
                            <img src="{{ asset('images/user/top/logo.png') }}" alt="">
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
                                    <a class="dropdown-item" href="{{ url('search-category')}}">自分の興味から探す</a>
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
                            <li class="nav-item"><a class="nav-link link-append show-modal-register-mypage" style="display: none;margin: 0px;" href="{{url('my-page')}}">マイテーマを見つける</a></li>
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
            <a class="btn_find {{Auth::Guest() ? 'show-modal-register-mypage' : ''}}" href="{{url('my-page')}}">マイテーマを見つける</a>
        </div>
        <!--/.bx_header-->
    </header>
           
        
    <div class="container-fluid top">
        <div class="banner figure">
            <!-- <div id="carouseltop" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner row mx-auto" role="listbox"> -->
                 <div class="slide-top">
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner_sp.png') }}" alt="楽しもう、背伸びしない自分を">
                        <img class="image-pc" src="{{ asset('images/user/top/banner.png') }}" alt="楽しもう、背伸びしない自分を">
                        <figcaption>
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title">楽しもう、背伸びしない自分を。</p>
                            <p class="title">やりたいことって必要なの ？</p>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner-1-sp.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <img class="image-pc" src="{{ asset('images/user/top/banner-1.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <figcaption>
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title">これからの就活。</p>
                            <p class="title"><span class="title-background">マイテーマ</span>を軸にする、</p>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner-2-sp.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <img class="image-pc" src="{{ asset('images/user/top/banner-2.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <figcaption>
                            <p class="description">What students want to know,Is it transmitted to real?</p>
                            <p class="title"><span class="title-background">マイテーマ</span>って何だろう。</p>
                            <p class="title">オトナって何だろう。</p>
                        </figcaption>
                    </figure>
                </div>
                <!-- </div>
                
            </div> -->
            <a class="scroll" href="#">SCROLL</a>
        </div>
        <div class="image-top row">
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-1.png') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-2.png') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-3.png') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-4.png') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-5.png') }}" class="img-detail" alt="Image slide">
            </div>
        </div>
        <div class="content top">
            <div class="container content-1">
                <div class="content-title">
                    <p class="content-1-title">何が起きるかわからない</p>
                    <p class="content-1-title"><span style="writing-mode: horizontal-tb;">5</span>年後に悩むのは、</p>
                    <p class="content-1-title">もうやめない ？</p>
                </div>
                <div class="content-1-content">
                    <div class="cb-path path-one"></div>
                    
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
                            @if(isset($videos) && $videos->count() > 0)
                            <div class="video-detail">
                                <div class="wrapper">
                                    <div class="thump">
                                        <div class="browse-details" data-id='{{$videos->id}}' data-src='{{$videos->embedHtml}}' data-url = "{{$videos->url}}">
                                            <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                        </div>
                                        <a href="#">
                                            <img class="img-icon" src="{{  $videos->thumbnails}}" alt="{{$videos->title}}">
                                        </a>
                                        <p class="video-title">{{ substr($videos->title, 0,50)}} {{strlen($videos->title) > 50 ? '...' : ''}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe> -->
                    </div>
                </div>
            </div>
            <div class="movie-top-2">
                <div class="container">
                    <div class="col-md-2 col-sm-12 col-xs-12row">
                        <p class="text-vertical">探す3つの理由</p>
                        <p class="text-vertical last">マイテ<span>ー</span>マを</p>
                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12 row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('images/user/top/movie-image-1.png') }}" alt="大学生活をはじめ、今をより充実させるための行動が定まる"></p>
                            <p class="text-tittle">01</p>
                            <p class="movie_image_description">大学生活をはじめ、今をより充実させるための行動が定まる</p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('images/user/top/movie-image-2.png') }}" alt="マイテーマを探す経験が、個性を際立たせる"></p>
                            <p class="text-tittle">02</p>
                            <p class="movie_image_description">マイテーマを探す経験が、個性を際立たせる</p>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <p><img class="movie-image" src="{{ asset('images/user/top/movie-image-3.png') }}" alt="人生100年時代でのキャリア選択や就活の指針に"></p>
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
                            <p class="text-title-3">マイテーマを見つける</p>
                        </div>
                        <div class="row">
                            @foreach($categories as $categorie)
                            <div class="col-md-3 img-cat-sp">
                                <a href="{{ url('search-category/'.$categorie->slug) }}">
                                    <img class="img-cat" src="{{ asset('images/admin/category/'.$categorie->icon) }}" alt="{{$categorie->name}}">
                                </a>
                            </div>
                            @endforeach
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
                                @foreach($videos_1 as $key => $result)
                                    @if($key == 0)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
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
                                @foreach($videos_1 as $key => $result)
                                    @if($key == 1)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_1 as $key => $result)
                                    @if($key == 2)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
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
                    <img src="{{ asset('images/user/top/arrow-1.png') }}" >
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
                                @foreach($videos_2 as $key => $result)
                                    @if($key == 0)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
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
                                @foreach($videos_2 as $key => $result)
                                    @if($key == 1)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_2 as $key => $result)
                                    @if($key == 2)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ substr($result->title, 0,50)}} {{strlen($result->title) > 50 ? '...' : ''}}</p>
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
                    <img src="{{ asset('images/user/top/arrow-1.png') }}">
                </a>
            </div>
            <div class="container movie-top-4 content-2">
                <div class="cb-path"></div>
                <p class="movie-top-text">イベントに参加する</p>
                <div class="event col-md-10">
                    <p class="movie-top-descroption">多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう</p>
                            
                </div>
                <a href="{{ url('event') }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('images/user/top/arrow-1.png') }}" >
                </a>
            </div>
            <div class=" content-last">
                <div class="container">
                    <div class="cb-path"></div>
                    <p class="movie-top-text">ハタチのトビラコラム</p>
                    <p class="movie-top-descroption">マイテーマをみつけるノウハウ、イベントレポート、アラハタ世代の活躍を発信していきます</p>
                    <div class="content-text col-md-10">
                        @forelse($columns as $key => $column)
                        <div class="item {{$key > 0 ? 'second' : ''}}">
                            <div class="text-category {{ $column->type == 1 ? 'last' : ''}}">{{ $column->type == 1 ?'コラム' :'インタビュー'}}</div>
                            <div class="wrapper">
                                <div class="icon">
                                    <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/column/'.$column->image; @endphp
                                        <img class="image" src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$column->title}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{ $column->favorite == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i></p>
                                    <p class="text-title"><a href="{{route('column.show', $column->id)}}">{{$column->title}}</a></p>
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
                            <img src="{{ asset('images/user/top/arrow-1.png') }}" >
                        </a>
                    </div>
                </div>
            </div>
            <div class="container button-link">
                <a class="link-my-page {{Auth::Guest() ? "show-modal-register-mypage" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>
            </div>
        </div>
        <div id="modal_video" class="modal fade modal_register" role="dialog">
            <div class="modal-dialog" style="margin-top:50px">
                <div class="modal-content" style="border-radius: 13px;">
                    <div class="modal-body" style="text-align:center">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="panel-body">
                        </div>
                        <div class="share">
                            <span class="article">シェアする</span>
                            <span><a class="twitter social-share" href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                            <span><a class="facebook social-share" href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        @include('includes.footer')
        @include('includes.login') 
    </div>

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
            
            $("body").css('padding-top','100px');
            $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
            $('.navbar-nav.mr-auto').removeClass('flex-column');
            $('.bx_header .navbar-nav.mr-auto').append('<li class="nav-item"><a class="nav-link link-append" href="{{url("my-page")}}">マイテーマを見つける</a></li>');
            $('.bx_header .navbar-nav.mr-auto').css('align-items','flex-start');
            $('.bx_header .navbar-nav.mr-auto').css('font-weight','bold');
            $('.bx_header .nav-item').addClass('aaaafixed');
            $('.banner.figure').append('<a class="link-my-page {{Auth::Guest() ? "show-modal-register-mypage" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>');

            $('.dropdown').on('show.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
              });

              // Add slideUp animation to Bootstrap dropdown when collapsing.
            $('.dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
            });

            $('.image-top.row').slick({
                autoplay: false,
                arrows: false,
                centerMode: true,
                  centerPadding: '10px',
                  slidesToShow: 3,
                  responsive: [
                    {
                      breakpoint: 768,
                      settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '10px',
                        slidesToShow: 3
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '120px',
                        slidesToShow: 1
                      }
                    }
                ]
            });
           
        }
        $(document).ready(function() {
            $("#modal_video").on('hide.bs.modal', function(){
                $("iframe").attr('src', '');
            });
            
            $('.slide-top').slick({
                autoplay: true,
                arrows: false
            });

            $(document).on('click','.video .video-list .browse-details', function(e){
                e.preventDefault();
                var idvideo = $(this).data('id');
                var src = $(this).data('src');
                var url = $(this).data('url');
                $('#modal_video .twitter').attr('href','https://twitter.com/intent/tweet?url='+url);
                $('#modal_video .facebook').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
                $('#modal_video .panel-body').html(src);
                $('#modal_video').modal('show');
            });

            var popupMeta = {
                width: 400,
                height: 400
            }
            $(document).on('click', '.social-share', function(event){
                event.preventDefault();

                var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                    hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

                var url = $(this).attr('href');
                var popup = window.open(url, 'Social Share',
                    'width='+popupMeta.width+',height='+popupMeta.height+
                    ',left='+vPosition+',top='+hPosition+
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                if (popup) {
                    popup.focus();
                    return false;
                }
            });



            $(document).on('click','.content-last .icon-favorior .fa-heart-o', function(e) {
                e.stopPropagation();
                var idevent = $(this).data('id');
                var user = $(this).data('user');
                var _this = $(this);
                if (user == '') {
                    $html = '';
                    $html +='<div class="form-group code-top">';
                        $html +='<div class="col-md-5" style="display: none;">';
                        $html +='<p class="title-register"></p>';
                        $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                        $html +='</div>';
                        $html +='<img src="{{ asset("images/register_love.png") }}">';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                        $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
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

            $(document).on('click','.show-modal-register-mypage',function(e){
                e.preventDefault();
                $html = '';
                $html +='<div class="form-group code-top">';
                    $html +='<div class="col-md-5" style="display: none;">';
                    $html +='<p></p>';
                    $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                    $html +='</div>';
                    $html +='<img src="{{ asset("images/register_mypage.png") }}">';
                $html +='</div>';
                $html +='<div class="form-group">';
                        $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                    $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                        $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                        $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
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
                

            })
        })
    </script>
</body>
</html>
