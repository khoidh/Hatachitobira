@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container enquiry">
        <div class="row">
            <section id="about_us">
                <div class="inside">
                    <div class="section-title show">
                        {{--<h2><img src="http://lp.hatachinotobira.com/wp-content/themes/hatachinotobira/images/number-01.svg" alt="01">ABOUT US</h2>--}}
                        <h2><img src="" alt="">ABOUT US</h2>
                        <h1>ハタチのトビラとは？</h1>
                        <div class="title_text">
                            <p>「自分のやりたいことってなんだ？」</p>
                            <p>ハタチのトビラは、就活や働くことを見据え将来と向き合うハタチの学生に、<br>
                                自社の事業や仕事の魅力を訴求する動画配信サービスです。</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
