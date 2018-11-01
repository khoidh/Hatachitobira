@extends('layouts.app')
@section('css-add')
    @parent
    <style>
        /* Custom, iPhone Retina, Tablets*/
        @media only screen and (min-width: 320px) and (max-width: 991px) {
            .home .main .title-lx .container .relative .info .title-e {
                margin-left: -5px;
                font-size: 55px;
            }

            header.fixed.headder .navbar.navbar-expand-lg.navbar-light p {
                font-size: 12px !important;
                position: relative;
                margin-left: -19px;
            }

            .navbar-toggler:not(:disabled):not(.disabled) {
                position: relative;
                right: 15px !important;
            }

            .home .main .title-lx {
                min-height: 90px;
                height: 90px;
            }

            .home .main .title-lx .container .relative .info {
                margin-top: -30px;
                line-height: 95%;
            }

            .home .main .title-lx .container .relative .info .absolute {
                bottom: 0;
                top: 95px;
                left: 10px;
            }

            .home .main .title-lx .container .relative .info .absolute .title-j {
                font-size: 30px;
            }
        }

        /* Medium Devices, Desktops */
        @media only screen and (min-width: 992px) {
            .home .main .title-lx {
                font-family: Oswald, sans-serif;
                background: #fff100;
                color: #fffa9d;
                display: block;
                font-size: 120px !important;
                min-height: 175px;
                width: 100%;
            }
        }
    </style>
@endsection
@section('title-e', 'About')
@section('title-j', 'ハタチのトビラとは ')
@section('content')
    <div class="container about about-desktop">
        <div class="row about-banner">
            <img src="{{asset("image/about/about_banner_lg.jpg")}}" alt="" style="width: 100%" />
        </div>
        <div class="row top">
            <div class="container content-1">
                <div class="about-content-title">
                    <p class="content-1-title"><span class="char-rotate">「</span>不安になったり、</p>
                    <p class="content-1-title">周りに流されたり、</p>
                    <p class="content-1-title">誰かに正解を</p>
                    <p class="content-1-title">求めたくなる<span class="char-rotate">…」</span></p>
                </div>
                <div class="col-md-12 about-content-1-content">
                    <div class="text-my-theme" style="padding-top: 0px;">
                        <div class="about-cb-path"></div>
                        <p class="text-detail">高校までは偏差値という便利な指標があったけど、<br>これから過ごす社会には共通の指標なんてない。 </p>
                        <p class="text-detail">親も先生も正解は誰も知らないんだ。<br>だからこそ‘自分なりの正解となるマイテーマを探しにいこう！</p>
                    </div>
                    <div class="text-my-theme">
                        <div class="about-cb-path"></div>
                        <p class="text_detail_title">なぜ、学校と社会をつなぐ“ハタチのトビラ”が生まれたのか？ </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row about-why-born">
            <div class="col-md-4 col-sm-4 col-xs-12 why-born-col">
                <p class="text_detail_title">自由が故に、<br>後悔する大学生活</p>
                <p class="text_detail">約65%が後悔する現実</p>
                <img src="{{asset("image/about/about_icon_01.jpg")}}" alt="" />
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 why-born-col">
                <p class="text_detail_title">就活までみえにくい<br>将来の選択肢</p>
                <p class="text_detail">大学と社会の距離が遠く、<br> 将来の選択肢がみえない </p>
                <img src="{{asset("image/about/about_icon_02.jpg")}}" alt="" style="width:120px;" />
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 why-born-col">
                <p class="text_detail_title">時代遅れの <br>やりたいこと論</p>
                <p class="text_detail">日本の就活に合わない <br>欧米型のキャリア論</p>
                <img src="{{asset("image/about/about_icon_03.jpg")}}" alt="" style="width:110px;" />
            </div>
        </div>
        <div class="row about-what-done">
            <div class="col-md-12">
                <div class="about-cb-path"></div>
                <p class="about-what-done-title">“ハタチのトビラ”できることとは？ </p>
            </div>
            <div class="col-md-4 what-done-col">
                <img src="{{asset("image/about/about_icon_04.jpg")}}" alt="" />
                <p class="text_detail_title">社会に触れ選択肢を知れ<br>るジョブシャドウ動画 </p>
                <p class="text_detail">多様な仕事の1日に触れ <br>自分の興味や視野を広げよう </p>
                <p class="more-detail">
                    <a href="{{route('video.index')}}" >
                        <span>MORE</span>
                        <img src="{{asset("image/top/arrow-1.png")}}" alt="" />
                    </a>
                </p>
            </div>
            <div class="col-md-4 what-done-col">
                <img src="{{asset("image/about/about_icon_05.jpg")}}" alt="" />
                <p class="text_detail_title">ロールモデルや新たな仲<br>間に出会うイベント </p>
                <p class="text_detail">ちょっと真面目な対話と自分<br>ならではの経験をしよう </p>
                <p class="more-detail">
                    <a href="{{route('event.index')}}" >
                        <span>MORE</span>
                        <img src="{{asset("image/top/arrow-1.png")}}" alt="" />
                    </a>
                </p>
            </div>
            <div class="col-md-4 what-done-col">
                <img src="{{asset("image/about/about_icon_06.jpg")}}" alt="" />
                <p class="text_detail_title">将来の方向性を見出すた<br>めのマイページ </p>
                <p class="text_detail">月単位でマイテーマや自分の<br>行動を記録しよう</p>
                <p class="more-detail">
                    <?php if(Auth::guest()) : ?>
                        <a data-toggle="modal" data-target="#modal_login">
                            <span>MORE</span>
                            <img src="{{asset("image/top/arrow-1.png")}}" alt="" />
                        </a>
                    <?php else: ?>
                        <a href="{{route('mypage.index')}}">
                        <span>MORE</span>
                        <img src="{{asset("image/top/arrow-1.png")}}" alt="" />
                        </a>
                    <?php endif; ?>   
                </p>
            </div>
        </div>
        <div class="row about-hatachi">
            <div class="col-md-12" style="margin-bottom:10px;">
                <div class="about-cb-path" style="margin-top:0;"></div>
                <p class="about-hatachi-title">“ハタチのトビラ”の先に、自分らしいレールつくるために  </p>
                <p class="about-hatachi-detail">学校と社会をつなぐ"ハタチのトビラ"は、 <br>将来の選択肢に触れ、マイテーマを探すきっかけを提供します </p>
            </div>
            <div class="col-md-4 about-hatachi-col">
                <a href="{{route('video.index')}}" class="btn-link">動画をみる</a>
            </div>
            <div class="col-md-4 about-hatachi-col">
                <a href="{{route('event.index')}}" class="btn-link">イベントに参加する</a>
            </div>
            <div class="col-md-4 about-hatachi-col">
                <?php if(Auth::guest()) : ?>
                <a class="btn-link show-modal-register" data-toggle="modal" data-target="#modal_register" style="color: white !important; cursor: pointer !important;">マイテーマを探す</a>
                <?php else: ?>
                <a href="{{route('mypage.index')}}" class="btn-link">マイテーマを探す</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
@endsection
