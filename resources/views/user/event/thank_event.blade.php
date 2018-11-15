@extends('layouts.app')
@section('css-add')
    @parent
    <style>
        @media (max-width: 575.98px) {
            .thank_event .image{
                margin-bottom: 80px;
            }
        }

    </style>
@endsection
@section('page_title', 'イベントお申込み完了')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のコラムページです。「私が、探求したいこと」であるマイテーマをみつけるノウハウ・イベントレポート・アラハタ世代の活躍を発信していきます。')
@section('main')
    <div class="container-fluid event">
        <div class="main row">
            <div class="title-lx">
                <div class="container">
                    <div class="relative row">
                        <div class="info col-md-12">
                            <span class="title-e">Event</span>
                            <div class="absolute">
                                <p><span class="title-j"> イベント</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container enquiry thank_event">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <p class="panel panel-default">
                <div class="title-x"><b>イベントへのお申し込み、ありがとうございます！</b></div>
                <div>イベントへ名： {{ $thisUser->title }}</div>
                <div>日程       ： {{ $thisUser->started_at }} ~ {{ $thisUser->closed_at }}</div>
                <div>場所       ： {{ $thisUser->address }}</div>
                <div>概要       ： {{ $thisUser->overview }}</div>
                <div>参加費      ： {{ $thisUser->entry_fee}} ¥</div>
                <div>定員       ： {{ $thisUser->capacity}} 人</div>
                <div>info@originalpoint.co.jpからのメールが受信できるよう設定の上お待ちください</div>
                <div class="image text-center">
                    <img src="{{asset('images/user/share/contact-email.png')}}" alt="contact-email.png">
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
