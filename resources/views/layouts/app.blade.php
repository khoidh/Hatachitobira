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

    <!-- Styles -->
    @section('css-add')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event.css') }}" rel="stylesheet">
    <link href="{{ asset('css/video.css') }}" rel="stylesheet">
    <link href="{{ asset('css/column.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @show

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
    @yield('css')
</head>
<body>
    <div id="app">
        @yield('slide')
        @include('includes.header')

        <div class="content">
            <div class="container-fluid">
                @yield('content')

            </div>
        </div>
        @include('includes.footer')
    </div>

    <!-- Scripts -->
    @section('javascript-add')
    <script src="{{ asset('js/app.js') }}"></script>
    @show

    @yield('javascript')
</body>
</html>
