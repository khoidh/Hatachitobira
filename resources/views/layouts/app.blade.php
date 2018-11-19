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
    @section('og-image')
        <meta property="og:image" content="{{ asset('images/logo_og.png') }}"" />
    @show
    <meta property="og:site_name" content="ハタチのトビラ" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="fb:app_id" content="{{ env('FACEBOOK_ID') }}" />
    <meta name="twitter:card" content=" summary" />

    @include('includes.gtm_head')
    @section('css-add')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    @show
    @yield('css')
</head>
<body class="@yield('body-class')">
    @include('includes.gtm_body')
    <div id="app" style="background: #FFFFFF">

    <!-- @yield('slide') -->
        <div class="content" style="top: 55px">
            <div class="container-fluid fixed-header">
                @include('includes.header')
            </div>

            {{--Main--}}
            @section('main')
            <div class="container-fluid headline">
                <h1 class="container">
                    <span class="title-e">@yield('title-e')</span>
                    <span class="title-j">@yield('title-j')</span>
                </h1>
            </div>
            @show
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
