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
                                <a class="nav-link active" href="#">ABOUT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">マイテーマ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">新規登録</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">企業採用担当の方</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ログイン</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--/.nav-->
            </div>
            <!--/.hd_left-->
            <div class="hd_right">
                <a class="btn_find" href="#">マイテーマを見つける</a>
            </div>
            <!--/.hd_right-->
        </div>
        <!--/.bx_header-->
    </header>
    <main>
        <div class="banner">
            <figure>
                <img src="{{ asset('image/top/banner.png') }}">
                <figcaption><img src="{{ asset('image/top/fig_banner.png') }}" alt=""></figcaption>
            </figure>
            <a href="#">SCROLL</a>
        </div>
        <div class="image-top">
            <img src="{{ asset('image/top/image-slide-1.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-2.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-3.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-4.png') }}" class="img-detail">
            <img src="{{ asset('image/top/image-slide-5.png') }}" class="img-detail last">
        </div>
        <div id="app">
            <div class="content top">
                <div class="container content-1">
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <div class="cb-path"></div>
                            <div class="row">
                                <div class="text-my-theme ">
                                    <p class="text-detail">ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。</p>
                                </div>
                            </div>
                            <div class="cb-path"></div>
                            <div class="row">
                                <div class="text-my-theme">
                                    <p class="text_detail_title">WHAT IS マイテーマ</p>
                                    <p class="text-detail">説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります</p>
                                </div>
                            </div>
                            <div class="cb-path"></div>
                        </div>
                        <div class="col-md-3 col-lg-3 title">
                            <p class="content-1-title">「 自分の</p>
                            <p class="content-1-title">やりたいことって</p>
                            <p class="content-1-title">なんだ ？ 」</p>
                        </div>
                    </div>
                </div>
                <div class="movie-top-1">
                    <p class="movie-top-title">Movie</p>
                    <p class="movie-top-description">コンセプトムービー</p>
                    <div class="corner-wrapper">
                        <iframe width="100%" height="490" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                </div>
                <div class="movie-top-2 row">
                    <div class="col-md-2">
                        <p class="text-vertical">見つける理由</p>
                        <p class="text-vertical last">マイテーマを</p>
                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-4">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-1.png') }}"></p>
                            <p class="movie_image_description">説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります</p>
                        </div>
                        <div class="col-md-4">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-2.png') }}"></p>
                            <p class="movie_image_description">説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります</p>
                        </div>
                        <div class="col-md-4">
                            <p><img class="movie-image" src="{{ asset('image/top/movie-image-3.png') }}"></p>
                            <p class="movie_image_description">説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります説明が入ります</p>
                        </div>
                    </div>
                </div>
                <div class="movie-top-3 row">
                    <div class="cb-path cb-path-black"></div>
                    <div class="col-md-10 row">
                        <div class="col-md-12">
                            <p class="text-title-3">私の興味からヒントを得る</p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-1.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-2.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-3.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-4.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-5.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-6.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-7.png') }}" alt="">
                        </div>
                        <div class="col-md-3">
                            <img class="img-cat" src="{{ asset('image/top/img-cate-8.png') }}" alt="">
                        </div>

                    </div>
                    <div class="col-md-2">
                        <p class="text-vertical-1 last"><span>マイテーマ</span>の</p>
                        <p class="text-vertical-1">見つけ方</p>
                    </div>
                </div>
                <div class="container movie-top-4">
                    <div class="cb-path"></div>
                    <p class="movie-top-text">社会をのぞいてみる</p>
                    <p class="movie-top-descroption">リアルな仕事から興味を広げてみよう</p>
                    <div class="col-md-10 video-detail row">
                        <div class="col-md-8">
                            <div class="corner-wrapper movie-1">
                                <iframe width="100%" height="270" left="0" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="corner-wrapper movie-2">
                                <iframe width="100%" height="131" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <div class="corner-wrapper movie-2">
                                <iframe width="100%" height="131" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
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
                    <p class="movie-top-text">マイテーマをイメージする</p>
                    <p class="movie-top-descroption">ロールモデルを参考にしてみよう</p>
                    <div class="col-md-10 video-detail row">
                        <div class="col-md-8">
                            <div class="corner-wrapper movie-1">
                                <iframe width="100%" height="270" left="0" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="corner-wrapper movie-2">
                                <iframe width="100%" height="131" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <div class="corner-wrapper movie-2">
                                <iframe width="100%" height="131" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <span class="more-detail ">MORE</span>
                        <img src="{{ asset('image/top/arrow-1.png') }}">
                    </a>
                </div>
                <div class="container movie-top-4 content-2">
                    <div class="cb-path"></div>
                    <p class="movie-top-text">イベントに参加する</p>
                    <p class="movie-top-descroption">イベントからマイテーマを見つけよう</p>
                    <a href="#">
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
                                <span class="text-category">インタビュー</span>
                                <div class="wrapper">
                                    <div class="icon">
                                        <img src="{{ asset('image/top/img-event-1.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;"></i></p>
                                        <p class="text-title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                                        <p class="text-date">2018.3.20</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item second">
                                <span class="text-category last">コラム</span>
                                <div class="wrapper">
                                    <div class="icon">
                                        <img src="{{ asset('image/top/img-event-1.png') }}" alt="">
                                    </div>
                                    <div class="content">
                                        <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;"></i></p>
                                        <p class="text-title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                                        <p class="text-date">2018.3.20</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container button-link">
                    <button type="button" class="btn btn-dark">マイテーマを見つける</button>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </main>
    @section('javascript-add')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
