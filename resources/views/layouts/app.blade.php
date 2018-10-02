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

        <div class="content home">
            <div class="container-fluid">
                {{--Main--}}
                <div class="main row">
                    <div class="title-lx">
                        <div class="container">
                            <div class="relative row">
                                <div class="info col-md-12 col-sm-12 col-xs-12">
                                    <p class="absolute-1">@yield('title-e','Title')</p>
                                    <div class="absolute-2">
                                        <p> @yield('title-j','タートル')</p>
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Content--}}
            <div class="container">
                @yield('content')
            </div>
        </div>
{{--        @include('includes.footer')--}}
    </div>

    <!-- Scripts -->
    @section('javascript-add')
        {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    @show

{{--    @yield('javascript')--}}
</body>
</html>
