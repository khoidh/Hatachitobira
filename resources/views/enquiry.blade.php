@extends('layouts.app')
@section('css-add')
    @parent
@endsection
@section('page_title', 'お問い合わせ')
@section('description', '"学校と社会をつなぐ「ハタチのトビラ」の問い合わせページです。ハタチのトビラに共感いただき、動画（採用広報映像）、イベント企画、イベント協賛、取材を申し込みたい方々は、こちらから問い合わせください。"')
@section('title-e', 'Contact')
@section('title-j', 'お問い合わせ')
@section('body-class', 'contact-page')
@section('content')
    <div class="container enquiry">
        <div class="row">
            <div class="enquiry-title col-sm-12">
                ハタチのトビラに共感いただき、動画（採用広報映像）、イベント企画、イベント協賛、取材を申し込みたい方々は、お手数ですが、下記にある必要事項をご記入の上、ご送信ください。
            </div>
            <div class="enquiry-form col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{--<form class="form-horizontal" action="{{route('enquiry-confirm')}}" method="POST">--}}
                <form class="form-horizontal" action="<?php echo e(route('enquiry-confirm')); ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="input-data">
                        {{-- ==================== 問い合わせ内容 ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="category_id">お問い合わせ内容</label>
                            <div class="col-sm-9" >
                                <div class="row">
                                    <div class="col-sm-6 category_id">
                                        <select name="category_id" class="form-control" autofocus tabindex=1>
                                            <option value="1" <?php if(old('category_id') == 1) echo 'selected' ?>>企業</option>
                                            <option value="0" <?php if(old('category_id') == 0) echo 'selected' ?>>その他</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" rows="4" name="content" placeholder="お問い合わせ内容がはいります" tabindex=1 value="">{{old('content')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ==================== 名前(姓名) ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="name">名前(姓名)</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" name="first_name" value="{{old('first_name')}}"  placeholder="姓" tabindex=1>
                                    </div>
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" name="last_name" value="{{old('last_name')}}"  placeholder="名" tabindex=1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ==================== ふりがな(姓名) ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3  col-form-label" for="name">ふりがな(姓名)</label>
                            <div class="col-sm-9 ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" name="first_name_cn" value="{{old('first_name_cn')}}"  placeholder="せい" tabindex=1>
                                    </div>
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" name="last_name_cn" value="{{old('last_name_cn')}}"  placeholder="めい" tabindex=2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ==================== 企業名 ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="name">企業名</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" name="company" value="{{old('company')}}"  tabindex=3>
                            </div>
                        </div>

                        {{-- ==================== メールアドレス ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="name">メールアドレス</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" name="email" value="{{old('email')}}"  tabindex=4>
                            </div>
                        </div>

                        {{-- ==================== 郵便番号 ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="name">郵便番号</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input  type="text" class="form-control" name="postal_code" value="{{old('postal_code')}}" tabindex=5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ==================== 住所 ======================= --}}
                        <div class="form-group form-group-lg row">
                            <label class="col-sm-3 col-form-label" for="name">ご住所</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="4" name="address" placeholder="ご住所" tabindex=6>{{old('address')}}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- =================== agreement ================== --}}
                    <div class="row">
                        <div class="col-sm-12 tit">
                            <div class="title-x">
                                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <br>
                                <p>個人情報の取り扱いについて</p>
                            </div>

                            <div class="content-text">
                                <ul>
                                    <li>いただいた個人情報は、事前の同意なしに公開されることはありません。</li>
                                    <li>このフォームで送信される情報はSSLにより暗号化されます。</li>
                                </ul>
                                <p>&nbsp&nbsp&nbsp&nbsp<span style="font-size: large">※</span>&nbsp詳しくは
                                    <a href="{{url('privacy-policy')}}"><u>プライバシーポリシー</u></a>をご覧ください。</p>
                                <div class="agreement">
                                    <input type="checkbox" name="" required="" id="privacy">
                                    <label class="checkboxtext" for="privacy">
                                        &nbsp&nbspプライバシーポリシーに同意する
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center form-group enquiry-btn">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="submit" class="round-button black lg">送信</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
