<html>
<head>
    @section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @show

    <title>Hatachi Admin</title>

    @section('css')
    <!-- <link rel="apple-touch-icon" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/ico/apple-icon-120.png"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="{{ asset('admin_plugin/css/line-awesome.min.css')}}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_plugin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_plugin/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_plugin/css/vendors/css/extensions/pace.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.min.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/switch.min.css')}}">
    <link href="{{asset('css/admin/font-awesome.min.css')}}" rel="stylesheet">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/style.css')}}">
    <!-- END Custom CSS-->


    @show

    @yield('javascrip')
        <link rel="stylesheet" href="">
</head>

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar pace-done menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" cz-shortcut-listen="true"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('admin.home') }}">
                        <img class="brand-logo" alt="modern admin logo" src="{{asset('images/admin/logo.png')}}">
                        <h3 class="brand-text">Hatachi Admin</h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    {{--<li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>--}}
                        {{--<div class="search-input">--}}
                            {{--<input class="input" type="text" placeholder="Explore Modern...">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav float-right">
                    <form method="POST" action="{{route('admin.logout')}}">
                        @csrf()
                        <button type="submit" class="btn btn-primary">{{__('ログアウト')}}</button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content ps-container ps-theme-light ps-active-y" data-ps-id="f27b8867-0cf3-2314-df44-9a215077ae1b">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{--=========================================== Categories ================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-sitemap"></i><span class="menu-title" data-i18n="nav.columns.main">{{__('カテゴリ')}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('categories.index')}}" data-i18n="nav.dash.allColumn">{{__('カテゴリ一覧')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('categories.create')}}" data-i18n="nav.dash.addColumn">{{__('追加する')}}</a>
                    </li>
                </ul>
            </li>
            {{--=========================================== Events ====================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-calendar"></i><span class="menu-title" data-i18n="nav.events.main">{{__('イベント')}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('events.index')}}" data-i18n="nav.dash.allEvent">{{__('イベント一覧')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('events.create')}}" data-i18n="nav.dash.addEvent">{{__('追加する')}}</a>
                    </li>
                </ul>
            </li>
            {{--=========================================== Videos ====================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-file-video-o"></i><span class="menu-title" data-i18n="nav.events.main">{{__('動画')}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('videos.index')}}" data-i18n="nav.dash.allVideo">{{__('動画一覧')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('videos.create')}}" data-i18n="nav.dash.addVideo">{{__('追加する')}}</a>
                    </li>
        </ul>
            </li>
            {{--=========================================== Columns ===================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.columns.main">{{__('コラム')}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('columns.index')}}" data-i18n="nav.dash.allColumn">{{__('コラム一覧')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('columns.create')}}" data-i18n="nav.dash.addColumn">{{__('追加する')}}</a>
                    </li>
                </ul>
            </li>

            {{--=========================================== Enquiry ===================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-edit"></i><span class="menu-title" data-i18n="nav.columns.main">{{__('お問い合わせ')}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('enquiry.index')}}" data-i18n="nav.dash.allColumn">{{__('一覧')}}</a>
                    </li>
                    
                </ul>
            </li>
            

        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -3097px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 3100px; height: 269px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 229px; height: 19px;"></div></div></div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">

            @yield('content-header')
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">@yield('content-title')</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    {{--<li><a data-action="collapse"><i class="ft-minus"></i></a></li>--}}
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    {{--<li><a data-action="close"><i class="ft-x"></i></a></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            {{-- Content home page only --}}
                            @section('card-content')
                                <section id="about_us" style="height: 61%">
                                    <div class="inside">
                                        <div class="section-title show" style="text-align:center">
                                            <h2></h2>
                                            <h1>ハタチのトビラへようこそ</h1>
                                            {{--<div class="title_text">--}}
                                                {{--<p>「自分のやりたいことってなんだ？」</p>--}}
                                                {{--<p>ハタチのトビラは、就活や働くことを見据え将来と向き合うハタチの学生に、<br>--}}
                                                    {{--自社の事業や仕事の魅力を訴求する動画配信サービスです。</p>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </section>
                            @show
                            <!-- Tables start -->
                            <div class="card-body">
                                @yield('content')
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        {{--<span class="float-md-left d-block d-md-inline-block">Copyright © 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span>--}}
        {{--<span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted &amp; Made with <i class="ft-heart pink"></i></span>--}}
    </p>
</footer>

@section('script')
<!-- BEGIN VENDOR JS-->

<script src="{{asset('js/admin/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/dragula.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/app-menu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/customizer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/admin/drag-drop.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/admin.js') }}"></script> -->
@show
@yield('customjavascript')
<div class="selection_bubble_root" style="display: none;"></div>
</body>
</html>
