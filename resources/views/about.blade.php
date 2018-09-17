@extends('layouts.app')
@section('css')
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/top.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
    <style>
        .navbar{
            border:0 !important;
        }
        .relative
        {
            position: relative !important;
        }
        .absolute
        {
            z-index: 1;
            position: absolute;
            left: 20%;
            top: 85%;
            /*width: 100%;*/
            background: white;
        }

        /*Cho điện thoại*/
        @media (max-width: 767px) {
            .content-a {
                padding-top: 200px;
            }
        }

        /*Cho ipad*/
        @media (min-width: 768px) and (max-width: 1024px) {
            .content-a {
                padding-top: 40px;
            }
        }

        /*Cho laptop*/
        /*@media (min-width: 1024px) {*/


    </style>
@endsection
@section('content')
    {{--<div class="container enquiry">--}}
        <div class="row">
            <h3>ABOUT「ハタチのトビラ」</h3>
            <div class="container">
                <section id="about_us">
                    <div class="inside">
                        <div class="section-title show">
                            {{--<h2><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/number-01.svg" alt="01">ABOUT US</h2>--}}
                            {{--<h2><img src="#" alt="">ABOUT US</h2>--}}
                            <h4>理念を伝えるタイトル</h4>
                            <div class="title_text">
                                <div class="content-image relative">
                                    <img src="{{asset("image/column/column02.jpg")}}" alt="" style="width: 80%">
                                    <div class="absolute">
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                    </div>
                                </div>
                                <div class="content-a">
                                    <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                    </p>
                                    <br>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img src="{{asset("image/column/column02.jpg")}}" alt="" style="width: 100%">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <button type="submit" value="Submit" class="btn btn-info">マイテーマを見つける</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    {{--</div>--}}
@endsection
