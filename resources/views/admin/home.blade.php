<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Admin</title>
    <link rel="apple-touch-icon" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/css/extensions/pace.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.min.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/css/plugins/forms/switch.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/assets/css/style.css">
    <!-- END Custom CSS-->
    @yield('javascrip')
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
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <img class="brand-logo" alt="modern admin logo" src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/logo/logo.png">
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
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Modern...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">John Doe</span>
                </span>
                            <span class="avatar avatar-online">
                  <img src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a> </div>
                    </li>
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-jp"></i> Japan</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                        </div>
                    </li>
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
            <li class="nav-item has-sub"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Categories</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="#" data-i18n="nav.dash.allCategori">All Categori</a>
                    </li>
                    <li class=""><a class="menu-item" href="#" data-i18n="nav.dash.addCategori">Add New</a>
                    </li>
                </ul>
            </li>
            {{--=========================================== Events ====================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.events.main">Events</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('events.index')}}" data-i18n="nav.dash.allEvent">All Event</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('events.create')}}" data-i18n="nav.dash.addEvent">Add New</a>
                    </li>
                </ul>
            </li>
            {{--=========================================== Videos ====================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.events.main">Videos</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('videos.index')}}" data-i18n="nav.dash.allVideo">All Video</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('videos.create')}}" data-i18n="nav.dash.addVideo">Add New</a>
                    </li>
        </ul>
            </li>
            {{--=========================================== Columns ===================================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.columns.main">Columns</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('columns.index')}}" data-i18n="nav.dash.allColumn">All Column</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('columns.create')}}" data-i18n="nav.dash.addColumn">Add New</a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span data-i18n="nav.category.admin">Administration</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
            </li>
            {{--=========================================== Admin Management ==========================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.admins.main">Admin Management</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="#" data-i18n="nav.dash.allAdmin">All Admin</a>
                    </li>
                    <li class=""><a class="menu-item" href="#" data-i18n="nav.dash.addAdmin">Add New</a>
                    </li>
                </ul>
            </li>
            {{--=========================================== Users Management ==========================================--}}
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.users.main">Users Management</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.users.nav_light">All Users</a>
                    </li>
                    <li><a class="menu-item" href="#" data-i18n="nav.users.nav_dark">Add New</a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span data-i18n="nav.category.general">General</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
            </li>
            {{--=========================================== General ===================================================--}}
            <li class="nav-item"><a href="#"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Tools</span></a>
            </li>
            <li class="nav-item"><a href="#"><i class="la la-comments"></i><span class="menu-title" data-i18n="">Settings</span></a>
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
            <section id="css-classes" class="card">
                <div class="card-header">
                    <h4 class="card-title">CSS Classes</h4>
                </div>
                <div class="card-content">
            @yield('content')
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright © 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted &amp; Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/vendors/js/extensions/dragula.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/core/app.min.js" type="text/javascript"></script>
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/js/scripts/extensions/drag-drop.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<div class="selection_bubble_root" style="display: none;"></div></body>
</html>
