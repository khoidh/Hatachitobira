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
{{--        @include('includes.header')--}}

        <div class="content">
            <div class="container-fluid">
                {{--Main--}}
                <div class="main row" style=" height: 130px; margin-bottom: 16px;">
                    <div class="title-lx"
                         style="font-family: Oswald, sans-serif;background: #FFF100;color: #FFFA9D;display: block;font-size: 80px;height: 107px; width: 100%">
                        <div class="container">
                            <div class="relative row" style="  position: relative;">
                                <div class="info col-md-12">
                                    <span>@yield('title-e','Title')</span>
                                    <div class="absolute"
                                         style="font-size: 20px; position: absolute;color: white; bottom: 5px; font-weight: bold;">
                                        <span style="background: #000000; letter-spacing:10px"> @yield('title-j','タートル')</span>
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
