@extends('layouts.app')
@section('css-add')
    @parent
@endsection
@section('title-e', 'Contact')
@section('title-j', 'お問い合わせ')
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
                    <img src="{{asset('image/share/contact-email.png')}}" alt="contact-email.png">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
