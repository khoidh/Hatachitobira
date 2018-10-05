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
        <script src="{{ asset('js/app.js') }}"></script>
    @show

{{--    @yield('css')--}}
</head>
<body>
    <div id="app" style="background: #FFFFFF">

        <!-- @yield('slide') -->
        <div class="content home">
            <div class="container-fluid">
            @include('includes.header')
                {{--Main--}}
                <div class="main row">
                    <div class="title-lx">
                        <div class="container">
                            <div class="relative row" style="  position: relative;">
                                <div class="info col-md-12">
                                    <span>@yield('title-e','Title')</span>
                                    <div class="absolute"
                                         style="font-size: 20px; position: absolute;color: #111; bottom: -5px; font-weight: bold;">
                                        <p style="margin-bottom: 0">@yield('title-black')</p>
                                        <p style="margin-bottom: 0"><span style="background: #000000; letter-spacing:10px;color: white;"> @yield('title-j','タートル')</span>@yield('title-blackspan')</p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            
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
