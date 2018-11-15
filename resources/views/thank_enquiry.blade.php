@extends('layouts.app')
@section('css-add')
    @parent
@endsection
@section('page_title', 'お問い合わせ完了')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」の問い合わせページです。ハタチのトビラに共感いただき、動画（採用広報映像）、イベント企画、イベント協賛、取材を申し込みたい方々は、こちらから問い合わせください。')
@section('main')
    <div class="container-fluid enquiry">
        <div class="main row">
            <div class="title-lx">
                <div class="container">
                    <div class="relative row">
                        <div class="info col-md-12">
                            <span class="title-e">Contact</span>
                            <div class="absolute">
                                <p><span class="title-j"> お問い合わせ</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container enquiry">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <div class="panel panel-default">
                <p class="title-x"><b>お問い合わせ、ありがとうございます！</b></p>
                <p class="title">2営業日以内に担当の者よりご連絡差し上げます。<br>
                    info@originalpoint.co.jpからのメールが受信できるよう設定の上お待ちください
                </p>
                <div class="image text-center">
                    <img src="{{asset('images/user/share/contact-email.png')}}" alt="contact-email.png">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
