<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Hatachi Tobira</title>
    {{--<title>{{ config('app.name') }}</title>--}}
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NP6F7VN');</script>
    <!-- End Google Tag Manager -->
    @section('css-add')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/top.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</head>
<body>
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
            @section('main')
                <div class="container-fluid home">
                    <div class="main row">
                        <div class="title-lx">
                            <div class="container">
                                <div class="relative row">
                                    <div class="info col-md-12">
                                        <span class="title-e">@yield('title-e','Title')</span>
                                        <div class="absolute">
                                            <p style="margin-bottom: 0">@yield('title-black')</p>
                                            <p style="margin-bottom: 0"><span
                                                        class="title-j"> @yield('title-j','タートル')</span>@yield('title-blackspan')
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @show

            @yield('content')
            @include('includes.footer') 
            @include('includes.login') 
        </div>
    </div>

    <!-- Scripts -->
    @section('javascript-add')
    @show

</body>
</html>
