@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/enquiry.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container enquiry">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading ">お問い合わせ</div>
                <div class="text-enquiry">
                    テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        <div class="content-form">
                            {{ csrf_field() }}
                            <div class="clearfix"> 
                                <div class="col-md-6 form-left">
                                    <div class="form-group clearfix">
                                        <div class="col-md-4 col-md-4 ">
                                            <label for="name" class="text-label control-label">名前</label>
                                            <label for="name" class="control-label"> 姓</label>
                                        </div>
                                        <div class="col-md-8 input">
                                            <input id="name" type="text" class="form-control" name="first_name" value="" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <div class="col-md-4 col-md-4 ">
                                            <label for="name" class="text-label-2 control-label">ふりがな</label>
                                            <label for="name" class="control-label">セイ</label>
                                        </div>
                                        <div class="col-md-8 input">
                                            <input id="name" type="text" class="form-control" name="first_name_cn" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-right">
                                    <div class="form-group clearfix">
                                        <label for="name" class="col-md-4 control-label">名</label>
                                        <div class="col-md-8 input">
                                            <input id="name" type="text" class="form-control" name="last_name" value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label for="name" class="col-md-4 control-label">メイ</label>
                                        <div class="col-md-8 input">
                                            <input id="name" type="text" class="form-control" name="last_name_cn" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="line-ab clearfix"></div>

                            <div class="form-group">
                                <div class="col-md-2 control-label">
                                    <label for="name">企業名</label>
                                </div>

                                <div class="col-md-10 text-input-full">
                                    <input id="name" type="text" class="form-control" name="company" value="" required >
                                </div>
                            </div>

                            <div class="line-ab clearfix"></div>

                            <div class="form-group">
                                <div class="col-md-2 control-label">
                                    <label for="name">メールアドレス</label>
                                </div>

                                <div class="col-md-10 text-input-full">
                                    <input id="name" type="text" class="form-control" name="email" value="{{Auth::guest() ? '' : Auth::user()->email}}" required >
                                </div>
                            </div>

                            <div class="line-ab clearfix"></div>

                            <div class="form-group">
                                <div class="col-md-2 control-label">
                                    <label for="name">内容</label>
                                </div>

                                <div class="col-md-10 text-input-full">
                                    <input id="name" type="text" class="form-control" name="content" value="" required  placeholder="研修or問い合わせ">
                                </div>
                            </div>
                        </div>

                        <div class="content-text">
                            <label>個人情報の取り扱いについて</label>
                            <ul>
                                <li>いただいた個人情報は、事前の同意なしに公開されることはありません。</li>
                                <li>このフォームで送信される情報はSSLにより暗号化されます。</li>
                            </ul>
                            <label>※詳しくはプライバシーポリシーをご覧ください。</label>
                        </div>

                        <div class="content-checkbox">
                            <div class="col-md-1 col-md-1 ">
                                <input type="checkbox" name="checkbox" required>
                            </div>
                            <div class="col-md-8 col-md-8 ">
                                <label>プライバシーポリシーに同意する</label>
                            </div>
                        </div>
                        <div class="col-md-12 clearfix">
                            <button type="submit" class="submit btn">送信</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
