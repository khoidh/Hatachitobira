@extends('layouts.app')
@section('css-add')
    @parent
@endsection
@section('title-e', 'Contact')
@section('title-j', 'お問い合わせ')
@section('content')
    <div class="container enquiry">
        <div class="row">
            <div class="enquiry-title col-sm-12">
                ハタチのトビラに共感いただき、動画（採用広報映像）、イベント企画、イベント協賛、取材を申し込みたい方々は、お手数ですが、下記にある必要事項をご記入の上、ご送信ください。
            </div>

            <div class="enquiry-form col-sm-12">
                {{--<div class="panel panel-default">--}}
                {{--<div class="panel-body">--}}
                <form class="form-horizontal">
                    {{ csrf_field() }}

                    {{-- ==================== 問い合わせ内容 ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="category_id">問い合わせ内容</label>
                        <div class="col-sm-9" >
                            <div class="row">
                                <div class="col-sm-6" style="padding-bottom: 15px;">
                                    <select name="category_id" class="form-control category_id" required="true" autofocus>
                                        <option selected>カテゴリ</option>
                                        {{--@foreach($categories as $category)--}}
                                        {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="form-control" rows="4" name="content" placeholder="お問い合わせ内容がはいります" required="true"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ==================== 名前(姓名) ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="name">名前(姓名)</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6" style="padding-bottom: 15px">
                                    <input  type="text" class="form-control" name="first_name" value=""  placeholder="姓" required tabindex=1>
                                </div>
                                <div class="col-sm-6">
                                    <input  type="text" class="form-control" name="last_name" value=""  placeholder="名" required tabindex=1>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ==================== ふりがな(姓名) ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3  col-form-label" for="name">ふりがな(姓名)</label>
                        <div class="col-sm-9 ">
                            <div class="row">
                                <div class="col-sm-6" style="padding-bottom: 15px">
                                    <input  type="text" class="form-control" name="first_name" value=""  placeholder="せい" required tabindex=1>
                                </div>
                                <div class="col-sm-6">
                                    <input  type="text" class="form-control" name="last_name" value=""  placeholder="めい" required tabindex=2>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ==================== 企業名 ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="name">企業名</label>
                        <div class="col-sm-9">
                            <input  type="text" class="form-control" name="first_name" value=""  required tabindex=3>
                        </div>
                    </div>

                    {{-- ==================== メールアドレス ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="name">メールアドレス</label>
                        <div class="col-sm-9">
                            <input  type="text" class="form-control" name="first_name" value=""  required tabindex=4>
                        </div>
                    </div>

                    {{-- ==================== 郵便番号 ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="name">郵便番号</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input  type="text" class="form-control" name="first_name" value="" required tabindex=5>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ==================== 住所 ======================= --}}
                    <div class="form-group form-group-lg row">
                        <label class="col-sm-3 col-form-label" for="name">住所</label>
                        <div class="col-sm-9" style="padding-bottom: 15px">
                            <textarea class="form-control" rows="4" name="content" placeholder="お問い合わせ内容がはいります" required="true" tabindex=6></textarea>
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
                                <p>※ 詳しくは<u>プライバシーポリシー</u>をご覧ください。</p>
                                <div class="agreement">
                                    <input type="checkbox" name="checkbox" required tabindex=8> プライバシーポリシーに同意する
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center form-group enquiry-btn">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="button" class="btn btn-primary btn-lg btn-block">送信</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
{{--<div class="container enquiry">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading ">お問い合わせ</div>--}}
                {{--<div class="text-enquiry">--}}
                    {{--テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST">--}}
                        {{--<div class="content-form">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<div class="clearfix">--}}
                                {{--<div class="col-md-6 form-left">--}}
                                    {{--<div class="form-group clearfix">--}}
                                        {{--<div class="col-md-4 col-md-4 ">--}}
                                            {{--<label for="name" class="text-label control-label">名前</label>--}}
                                            {{--<label for="name" class="control-label"> 姓</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-8 input">--}}
                                            {{--<input id="name" type="text" class="form-control" name="first_name" value="" required autofocus tabindex=1>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group clearfix">--}}
                                        {{--<div class="col-md-4 col-md-4 ">--}}
                                            {{--<label for="name" class="text-label-2 control-label">ふりがな</label>--}}
                                            {{--<label for="name" class="control-label">セイ</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-8 input">--}}
                                            {{--<input id="name" type="text" class="form-control" name="first_name_cn" value="" required tabindex=3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-6 form-right">--}}
                                    {{--<div class="form-group clearfix">--}}
                                        {{--<label for="name" class="col-md-4 control-label">名</label>--}}
                                        {{--<div class="col-md-8 input">--}}
                                            {{--<input id="name" type="text" class="form-control" name="last_name" value="" required tabindex=2>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group clearfix">--}}
                                        {{--<label for="name" class="col-md-4 control-label">メイ</label>--}}
                                        {{--<div class="col-md-8 input">--}}
                                            {{--<input id="name" type="text" class="form-control" name="last_name_cn" value="" required tabindex=4>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="line-ab clearfix"></div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-2 control-label">--}}
                                    {{--<label for="name">企業名</label>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-10 text-input-full">--}}
                                    {{--<input id="name" type="text" class="form-control" name="company" value="" required tabindex=5>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="line-ab clearfix"></div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-2 control-label">--}}
                                    {{--<label for="name">メールアドレス</label>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-10 text-input-full">--}}
                                    {{--<input id="name" type="text" class="form-control" name="email" value="{{Auth::guest() ? '' : Auth::user()->email}}" required tabindex=6>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="line-ab clearfix"></div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-2 control-label">--}}
                                    {{--<label for="name">内容</label>--}}
                                {{--</div>--}}

                                {{--<div class="col-md-10 text-input-full">--}}
                                    {{--<input id="name" type="text" class="form-control" name="content" value="" required  placeholder="研修or問い合わせ" tabindex=7>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="content-text">--}}
                            {{--<label>個人情報の取り扱いについて</label>--}}
                            {{--<ul>--}}
                                {{--<li>いただいた個人情報は、事前の同意なしに公開されることはありません。</li>--}}
                                {{--<li>このフォームで送信される情報はSSLにより暗号化されます。</li>--}}
                            {{--</ul>--}}
                            {{--<label>※詳しくはプライバシーポリシーをご覧ください。</label>--}}
                        {{--</div>--}}

                        {{--<div class="content-checkbox">--}}
                            {{--<div class="col-md-1 col-md-1 ">--}}
                                {{--<input type="checkbox" name="checkbox" required tabindex=8>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8 col-md-8 ">--}}
                                {{--<label>プライバシーポリシーに同意する</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12 clearfix">--}}
                            {{--<button type="submit" class="submit btn" tabindex=9>送信</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
