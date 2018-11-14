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
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のイベントページです。多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう。')
@section('title-e', 'Event')
@section('title-j', 'イベント')
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
