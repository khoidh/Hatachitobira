@extends('layouts.app')
@section('page_title', 'ハタチのトビラとは')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」は、将来の選択肢に触れ、マイテーマを探すきっかけを提供します。誰にでも見出せるマイテーマは、変化していくものでありながら、今と未来をより充実させるための行動指針となっていきます。')
@section('title-e', 'Password Reset')
@section('title-j', 'パスワードリセット')
@section('body-class', 'password-reset-page')

@section('content')
<div class="container" style="padding: 0;">
    <br>
    <br>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">メールアドレス</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="round-button black md">送信</button>
            </div>
        </div>
    </form>
</div>
@endsection
