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
@section('title-e', 'Event')
@section('title-j', 'イベント')
@section('body-class', 'event-page')
@section('content')
    <div class="container enquiry thank_event">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <p class="panel panel-default">
                <h2 class="title-x"><b>イベントへのお申し込み、ありがとうございます！</b></h2>
                <p class="mb-40"><a href="info@originalpoint.co.jp">info@originalpoint.co.jp</a>より受付完了メールをお送りしておりますので、ご確認ください</p>

                <h3>お申込み内容</h3>
                <div class="txt-form">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="table-td_1" scope="row"><b>日程</b></td>
                            <td class="table-td_2">{{ date(config('const.ymdHi'), strtotime($thisUser->started_at)) }} 〜 {{ date(config('const.ymdHi'), strtotime($thisUser->closed_at)) }}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>場所</b></td>
                            <td class="table-td_2">{!! nl2br($thisUser->address) !!}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>概要</b></td>
                            <td class="table-td_2">{!! nl2br($thisUser->overview) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="image text-center">
                    <img src="{{asset('images/user/share/contact-email.png')}}" alt="contact-email.png">
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
