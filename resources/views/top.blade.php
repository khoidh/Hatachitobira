@php
$title = 'ハタチのトビラ';
$description = '学校と社会をつなぐ「ハタチのトビラ」は、将来の選択肢に触れ、マイテーマを探すきっかけを提供します。誰にでも見出せるマイテーマは、変化していくものでありながら、今と未来をより充実させるための行動指針となっていきます。';
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    <meta content="{{ $description }}" name="description">
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="{{ asset('images/logo_og.png') }}"" />
    <meta property="og:site_name" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_ID') }}" />
    <meta name="twitter:card" content=" summary" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slick/slick.css') }}" rel="stylesheet">
    @include('includes.gtm_head')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/slick/slick.min.js') }}"></script>
    <script>
      (function(d) {
        var config = {
          kitId: 'jvp2hjd',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
</head>
<body id="top" style="overflow-x: hidden;">
    @include('includes.gtm_body')
    <header id="myHeader" class="top-header">
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
                        <span class="navbar-toggler-icon-tmp"></span>
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
                            {{-- <li class="nav-item"><a class="nav-link link-append show-modal-register-mypage" style="display: none;margin: 0px;" href="{{url('my-page')}}">マイテーマを見つける</a></li> --}}
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
    <div class="container-fluid fixed-header">
    @include('includes.header')
    </div>
        
    <div class="container-fluid top">
        <div class="banner figure">
            <!-- <div id="carouseltop" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner row mx-auto" role="listbox"> -->
                 <div class="slide-top">
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner_sp.png') }}" alt="楽しもう、背伸びしない自分を">
                        <img class="image-pc" src="{{ asset('images/user/top/banner.png') }}" alt="楽しもう、背伸びしない自分を">
                        <figcaption class="first">
                            <div class="text-vertical-pc">
                                <p class="title">やりたいことって必要なの？<br>楽しもう、背伸びしない自分を</p>
                                <p class="description">Don’t need to aim too high. You only live once. Might as well enjoy it.</p>
                            </div>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner-1-sp.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <img class="image-pc" src="{{ asset('images/user/top/banner-1.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <figcaption>
                            <div class="text-vertical-pc">
                                <p class="title"><span class="title-background">マイテーマ</span>を軸にする、<br>これからの就活。</p>
                                <p class="description">What is to be an adult? What is your theme? Find yourself here!</p>
                            </div>
                        </figcaption>
                    </figure>
                    <figure class="carousel-item">
                        <img class="image-sp" src="{{ asset('images/user/top/banner-2-sp.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <img class="image-pc" src="{{ asset('images/user/top/banner-2.png') }}" alt="楽しもう、背伸びしない自分を。">
                        <figcaption>
                            <div class="text-vertical-pc">
                                <p class="title">オトナって何だろう。<br><span class="title-background">マイテーマ</span>って何だろう。</p>
                                <p class="description">Job hunting will be based on themes.</p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- </div>
                
            </div> -->
            <a class="scroll" href="#">SCROLL</a>
        </div>
        <div class="image-top row">
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-1.jpg') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-2.jpg') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-3.jpg') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-4.jpg') }}" class="img-detail" alt="Image slide">
            </div>
            <div class="img-size">
                <img src="{{ asset('images/user/top/image-slide-5.jpg') }}" class="img-detail" alt="Image slide">
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
                    
                    <div class="text-my-theme text-my-theme1">
                        <p class="text-detail">学校と社会をつなぐ"ハタチのトビラ"は、将来の選択肢に触れ、マイテーマを探すきっかけを提供します</p>
                    </div>
                    
                    <div class="cb-path last"></div>
                    
                    <div class="text-my-theme text-my-theme2">
                        <h3 class="text_detail_title"><img src="/images/user/top/back-gr-1.png"><span>WHAT IS マイテーマ</span></h3>
                        <p class="text-detail">マイテーマとは、自分の興味と意志からつくられる「私が、探求したいこと」です。誰にでも見出せるマイテーマは、変化していくものでありながら、今と未来をより充実させるための行動指針となっていきます。</p>
                    </div>
                </div>
                <div class="cb-path last2"></div>
            </div>
            <div class="movie-top-1">
                <div class="container">
                    <h2 class="movie-top-title">Movie</h2>
                    <p class="movie-top-description">コンセプトムービー</p>
                    <div class="corner-wrapper video">
                        <div class="video-list">
                            <div class="video-detail">
                                <div class="wrapper">
                                    <div class="thump">
                                        @if(isset($video_concept) && $video_concept->count() > 0)
                                        <div class="browse-details video_concept" data-id='{{$video_concept->id}}' data-src='{{$video_concept->embedHtml}}' data-url = "{{$video_concept->url}}">
                                            <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                        </div>
                                        <a href="#">
                                            <img class="img-icon" src="{{  $video_concept->thumbnails}}" alt="{{$video_concept->title}}">
                                        </a>
                                        <p class="video-title">{{$video_concept->title}}</p>
                                        @else
                                        <div class="browse-details video_concept" data-id='1' data-src='' data-url = "">
                                            <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                        </div>
                                        <a href="#">
                                            <img class="img-icon" src="" alt="">
                                        </a>
                                        <p class="video-title">映画テンプレート</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe> -->
                    </div>
                </div>
            </div>
            <div class="movie-top-2">
                <div class="container flex-space-between-pc">
                    <div class="c-col p-text">
                        <h2 class="text-vertical-pc p-vertical-title"><span>マイテーマ</span>を<br>探す3つの理由</h2>
                    </div>
                    @include('includes.merit_box', [
                        'number'=>1,
                        'image'=>'images/user/top/movie-image-1.png',
                        'title'=>'大学生活をはじめ、今をより充実させるための行動が定まる',
                    ])
                    @include('includes.merit_box', [
                        'number'=>2,
                        'image'=>'images/user/top/movie-image-2.png',
                        'title'=>'マイテーマを探す経験が、個性を際立たせる',
                    ])
                    @include('includes.merit_box', [
                        'number'=>3,
                        'image'=>'images/user/top/movie-image-3.png',
                        'title'=>'人生100年時代でのキャリア選択や就活の指針に',
                    ])
                </div>
                <img src="/images/user/top/back-gr-2.png" class="back-gr">
            </div>
        </div>
        <div class="content top">
            <div class="movie-top-3">
                <div class="container">
                    <div class="content-tile-movie">
                        <h2 class="text-vertical-pc p-vertical-title"><span>マイテーマ</span>の<br class="pc">探し方</h2>
                    </div>
                    <div class="cb-path cb-path-black"></div>
                    <div class="content-row">
                        <div class="col-md-12">
                            <h3 class="text-title-3">自分の興味から探す</h3>
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
                <h3 class="movie-top-text">将来の選択肢から探す</h3>
                <p class="movie-top-descroption">多様な仕事現場の働く1日に学生が密着した映像から、マイテーマの種をみつけよう</p>
                <div class="col-md-10 video-detail row mx-auto">
                    <div class="col-md-8">
                        <div class="corner-wrapper video movie-1">
                            <div class="video-list">
                                @foreach($videos_jobshadow as $key => $result)
                                    @if($key == 0)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                     <div class="browse-details">
                                                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                </div>
                                                </a>
                                               
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie flex-space-between-mobile">
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_jobshadow as $key => $result)
                                    @if($key == 1)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                    <div class="browse-details">
                                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_jobshadow as $key => $result)
                                    @if($key == 2)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                    <div class="browse-details">
                                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a href="{{ route('video', ['slug' => 'job_shadow']) }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('images/user/top/arrow-1.png') }}" >
                </a>
            </div>

            <div class="container movie-top-4 content-2">
                <div class="cb-path mt-30"></div>
                <h2 class="movie-top-text">ロールモデルから探す</h2>
                <p class="movie-top-descroption">多様なロールモデルのマイテーマに沿った生き方から、マイテーマの種をみつけよう</p>
                <div class="col-md-10 video-detail row mx-auto">
                    <div class="col-md-8">
                        <div class="corner-wrapper video movie-1">
                            <div class="video-list">
                                @foreach($videos_roleplay as $key => $result)
                                    @if($key == 0)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                    <div class="browse-details">
                                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 video-movie flex-space-between-mobile">
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_roleplay as $key => $result)
                                    @if($key == 1)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                    <div class="browse-details">
                                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="corner-wrapper video movie-2">
                            <div class="video-list">
                                @foreach($videos_roleplay as $key => $result)
                                    @if($key == 2)
                                    <div class="video-detail">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <a href="{{$result->youtube_url}}" target="_blank">
                                                    <div class="browse-details">
                                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <img class="img-icon" src="<?php echo asset('images/admin/top_videos/'.$result->thumbnail) ?>" alt="{{$result->title}}">
                                                </a>
                                                <p class="video-title sub-title">{{ $result->title }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                <a href="{{ route('video', ['slug' => 'role_model']) }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('images/user/top/arrow-1.png') }}">
                </a>
            </div>
            <div class="container movie-top-4 content-2">
                <div class="cb-path mt-30"></div>
                <h3 class="movie-top-text">イベントに参加する</h3>
                <div class="event col-md-10" style="padding-left:0px;">
                    <p class="movie-top-descroption">多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう</p>
                            
                </div>
                <a href="{{ url('event') }}">
                    <span class="more-detail ">MORE</span>
                    <img src="{{ asset('images/user/top/arrow-1.png') }}" >
                </a>
            </div>
            <div class=" content-last">
                <div class="container">
                    <div class="cb-path mt-30"></div>
                    <h3 class="movie-top-text">ハタチのトビラコラム</h3>
                    <p class="movie-top-descroption">マイテーマをみつけるノウハウ、イベントレポート、アラハタ世代の活躍を発信していきます</p>
                    <div class="content-text col-md-12">
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
            <div class="container button-link bottom">
                <a class="round-button black lg {{Auth::Guest() ? "show-modal-register-mypage" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>
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
                    $('.fixed-header').show();
                    $('.top-header').hide();
                    // header.classList.add("fixed");
                    // $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
                    // $('.navbar-nav.mr-auto').removeClass('flex-column');
                    // $('.nav-link.link-append').css('display','block');
                } else {
                    $('.fixed-header').hide();
                    $('.top-header').show();
                    // header.classList.remove("fixed");
                    // $('.bx_header .navbar-nav.mr-auto .link-a').remove();
                    // $('.navbar.navbar-expand-lg.navbar-light').addClass('flex-column');
                    // $('.navbar-nav.mr-auto').addClass('flex-column');
                    // $('.nav-link.link-append').css('display','none');
                }
            }
            myFunction();
        }

        if (window.innerWidth < 993) {
            
            // $("body").css('padding-top','100px');
            // $('.navbar.navbar-expand-lg.navbar-light').removeClass('flex-column');
            // $('.navbar-nav.mr-auto').removeClass('flex-column');
            // $('.bx_header .navbar-nav.mr-auto').append('<li class="nav-item"><a style="height: 40px; padding: 8px 0px;" class="nav-link link-append {{Auth::Guest() ? 'show-modal-register-mypage' : ''}}" href="{{url("my-page")}}">マイテーマを見つける</a></li>');
            // $('.bx_header .navbar-nav.mr-auto').css('align-items','flex-start');
            // $('.bx_header .navbar-nav.mr-auto').css('font-weight','bold');
            // $('.bx_header .navbar-nav.mr-auto').css('background-color','#fff');
            // $('.bx_header .navbar-nav.mr-auto').css('margin-top','10px');
            // $('.bx_header .nav-item').addClass('aaaafixed');
            // $('.banner.figure').append('<a class="round-button black lg {{Auth::Guest() ? "show-modal-register-mypage" : ""}}" href="{{url("my-page")}}">マイテーマを見つける</a>');

            // $('.dropdown').on('show.bs.dropdown', function() {
            //     $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
            //   });

            //   // Add slideUp animation to Bootstrap dropdown when collapsing.
            // $('.dropdown').on('hide.bs.dropdown', function() {
            //     $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
            // });

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

            function GetURLParameter(sParam) {
                var sPageURL = window.location.search.substring(1);
                var sURLVariables = sPageURL.split('&');
                for (var i = 0; i < sURLVariables.length; i++){
                    var sParameterName = sURLVariables[i].split('=');
                    if (sParameterName[0] == sParam)
                    {
                        return sParameterName[1];
                    }
                }
            }

            tech = GetURLParameter('redirect-link');
            if (tech == 'true') {
                $html = '<div class ="form-register-last">'
                $html += '<div class="form-group">';
                $html +='<h3>会員登録が完了しました!</h3>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">マイテーマを探すために、</label>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">気になる動画の収集や、個人の活動の記録を</label>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">管理していきましょう。</label>';
                $html +=' </div>';
                $html += '<div class="form-group" style="margin-bottom: 28px; margin-top: 30px;">';
                $html +='<img class="image-register" src="{{ asset("images/register_1.png") }}">';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html += '<div class="col-md-12">'
                $html +='<a  class="btn btn-warning" href="{{route("mypage.index")}}">MY PAGEへ</a>';
                $html +=' </div>';
                $html +=' </div>';
                $html +=' </div>';
                $('#modal_register').find('.panel-body').addClass('form-horizontal');
                $('#modal_register').find('.panel-body').html($html);
                $('#modal_register').modal('show');
            }


            
            $("#modal_video").on('hide.bs.modal', function(){
                $("iframe").attr('src', '');
            });
            
            $('.slide-top').slick({
                autoplay: true,
                arrows: false
            });

            $(document).on('click','.video .video-list .video_concept', function(e){
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
                        $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                            
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
                    $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                        $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                        $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
                        $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';

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
