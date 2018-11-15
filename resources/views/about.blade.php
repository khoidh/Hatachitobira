@extends('layouts.app')
@section('css-add')
    @parent
    <style>
        /* Custom, iPhone Retina, Tablets*/
        @media only screen and (min-width: 320px) and (max-width: 991px) {
            .navbar-toggler:not(:disabled):not(.disabled) {
                position: relative;
                right: 15px !important;
            }
        }
    </style>
@endsection
@section('page_title', 'ハタチのトビラとは')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」は、将来の選択肢に触れ、マイテーマを探すきっかけを提供します。誰にでも見出せるマイテーマは、変化していくものでありながら、今と未来をより充実させるための行動指針となっていきます。')
@section('title-e', 'About')
@section('title-j', 'ハタチのトビラとは')
@section('body-class', 'about-page')

@section('content')
    <div class="about-banner">
        <img src="{{asset("images/user/about/about_banner_lg.jpg")}}" alt="ハタチのトビラとは" />
        <div class="div-bg"></div>
        <p class="about-content-title text-vertical-pc">「正解がわからないから、<span>誰かに正解を</span>求めたくなる時代…」</p>
    </div>
    <div class="container about about-desktop">
        <div class="top" style="margin-left: 0; margin-right: 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="container content-1">
                        <div class="about-content-1-content">
                            <div class="text-my-theme" style="padding-top: 70px;">
                                <div class="about-cb-path path-1"></div>
                                <p class="text-detail">高校までは偏差値という便利な指標があったけど、<br class="pc">これから過ごす社会には共通の指標なんてない。 </p>
                                <p class="text-detail">親も先生も正解は誰も知らないんだ。<br class="pc">だからこそ、自分なりの正解となるマイテーマを探しにいこう！</p>
                            </div>
                            <div class="text-my-theme">
                                <div class="about-cb-path path-2"></div>
                                <h3 class="text_detail_title">なぜ、学校と社会をつなぐ<br class="sp">“ハタチのトビラ”が生まれたのか？ </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-why-born"  style="margin-left: 0; margin-right: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="why-born-col">
                        <p class="text_detail_title jladev_fix_about_1">自由が故に、<br>後悔する大学生活</p>
                        <p class="text_detail jladev_fix_about_1">約65%が後悔する現実<br><br></p>
                        <img src="{{asset("images/user/about/about_icon_01.jpg")}}" alt="about_icon_01.jpg"/>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="why-born-col">
                        <p class="text_detail_title jladev_fix_about_2">就活までみえにくい<br>将来の選択肢</p>
                        <p class="text_detail jladev_fix_about_2">大学と社会の距離が遠く、将来の選択肢がみえない </p>
                        <img src="{{asset("images/user/about/about_icon_02.jpg")}}" alt="about_icon_02.jpg"/>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="why-born-col">
                        <p class="text_detail_title jladev_fix_about_2">時代遅れの <br>やりたいこと論</p>
                        <p class="text_detail jladev_fix_about_2">日本の就活に合わない欧米型のキャリア論</p>
                        <img src="{{asset("images/user/about/about_icon_03.jpg")}}" alt="about_icon_03.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container about about-desktop">
        <div class="about-what-done"  style="margin-left: 0; margin-right: 0;" >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-cb-path"></div>
                        <p class="about-what-done-title">“ハタチのトビラ”できることとは？ </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="what-done-col">
                            <img src="{{asset("images/user/about/about_icon_04.jpg")}}" alt="" />
                            <p class="text_detail_title">社会に触れ選択肢を知れる<br class="pc">ジョブシャドウ動画 </p>
                            <p class="text_detail">多様な仕事の1日に触れ<br class="pc">自分の興味や視野を広げよう </p>
                            <p class="more-detail">
                                <a href="{{route('video.index')}}" >
                                    <span>MORE</span>
                                    <img src="{{asset("images/user/top/arrow-1.png")}}" alt="" />
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="what-done-col">
                            <img src="{{asset("images/user/about/about_icon_05.jpg")}}" alt="" />
                            <p class="text_detail_title">ロールモデルや新たな仲間に出会うイベント </p>
                            <p class="text_detail">ちょっと真面目な対話と自分<br>ならではの経験をしよう </p>
                            <p class="more-detail">
                                <a href="{{route('event.index')}}" >
                                    <span>MORE</span>
                                    <img src="{{asset("images/user/top/arrow-1.png")}}" alt="" />
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="what-done-col">
                            <img src="{{asset("images/user/about/about_icon_06.jpg")}}" alt="" />
                            <p class="text_detail_title">将来の方向性を見出すための<br class="pc">マイページ </p>
                            <p class="text_detail">月単位でマイテーマや自分の<br>行動を記録しよう</p>
                            <p class="more-detail">
                                <?php if(Auth::guest()) : ?>
                                <a data-toggle="modal" data-target="#modal_login">
                                    <span>MORE</span>
                                    <img src="{{asset("images/user/top/arrow-1.png")}}" alt="" />
                                </a>
                                <?php else: ?>
                                <a href="{{route('mypage.index')}}">
                                    <span>MORE</span>
                                    <img src="{{asset("images/user/top/arrow-1.png")}}" alt="" />
                                </a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-hatachi"  style="margin-left: 0; margin-right: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <div class="about-cb-path" style="margin-top:0;"></div>
                        <p class="about-hatachi-title">“ハタチのトビラ”の先に、自分らしいレールつくるために  </p>
                        <p class="about-hatachi-detail">学校と社会をつなぐ"ハタチのトビラ"は、 <br>将来の選択肢に触れ、マイテーマを探すきっかけを提供します </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-20">
                        <a class="round-button black lg full" href="{{route('video.index')}}" class="btn-link">動画をみる</a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-20">
                        <a class="round-button black lg full" href="{{route('event.index')}}" class="btn-link">イベントに参加する</a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mb-20">
                        <?php if(Auth::guest()) : ?>
                        <a class="round-button black lg full show-modal-register" data-toggle="modal" data-target="#modal_register" style="color: white !important; cursor: pointer !important;">マイテーマを探す</a>
                        <?php else: ?>
                        <a class="round-button black lg full" href="{{route('mypage.index')}}" class="btn-link">マイテーマを探す</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
