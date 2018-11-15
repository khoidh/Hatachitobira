<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') | ハタチのトビラ</title>
    <meta content="@yield('description')" name="description">
    <meta property="og:title" content="@yield('page_title')" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="ハタチのトビラ" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_ID') }}" />
    <meta name="twitter:card" content=" summary" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NP6F7VN');</script>
    <!-- End Google Tag Manager -->
    @section('css-add')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    @show
    @yield('css')
</head>
<body class="@yield('body-class')">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP6F7VN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="app" style="background: #FFFFFF">

    <!-- @yield('slide') -->
        <div class="content" style="top: 55px">
            <div class="container-fluid">
                @include('includes.header')
            </div>

            {{--Main--}}
            <div class="container-fluid headline">
                <h1 class="container">
                    <span class="title-e">@yield('title-e')</span>
                    <span class="title-j">@yield('title-j')</span>
                </h1>
            </div>

            @yield('content')
            @include('includes.footer')
            @include('includes.login')
            @include('includes.loader')
        </div>
    </div>
    <!-- Scripts -->
    @section('javascript-add')
    @show

</body>
</html>
