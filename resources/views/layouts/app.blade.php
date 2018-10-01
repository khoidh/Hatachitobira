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
    @show

{{--    @yield('css')--}}
</head>
<body>
    <div id="app" style="background: #FFFFFF">
        @yield('slide')
        @include('includes.header')

        <div class="content">
            <div class="container-fluid">
                {{--Main--}}
                <div class="main row" style=" height: 190px; margin-bottom: 30px;">
                    <div class="title-lx"
                         style="font-family: Oswald, sans-serif;background: #fff100;color: #fffa9d;display: block;font-size: 120px;height: 175px; width: 100%">
                        <div class="container">
                            <div class="relative row" style="  position: relative;">
                                <div class="info col-md-12" style=" margin-top: 35px">
                                    <p style=" font-size: 120px; letter-spacing:-10px; margin-left: -8px;">@yield('title-e','Title')</p>
                                    <div class="absolute"
                                         style="font-size: 20px; position: absolute;color: white; bottom: 15px; font-weight: bold;">
                                        <p style="background: #000000; font-size: 35px; letter-spacing:10px; line-height: 94%;"> @yield('title-j','タートル')</p>
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Content--}}
             @yield('content')

        </div>
{{--        @include('includes.footer')--}}
    </div>

    <!-- Scripts -->
    @section('javascript-add')
        <script src="{{ asset('js/app.js') }}"></script>
    @show

{{--    @yield('javascript')--}}
</body>
</html>
