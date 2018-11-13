@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/p404.css') }}" rel="stylesheet">
@endsection
@section('page_title', 'お探しのページは見つかりませんでした')
@section('title-e', '404 file not found')
@section('title-j', 'お探しのページは見つかりません')
@section('content')
    <div class="container p-404">
        <div class="row">
            <div class="col-xs-12">
                <p>お探しのページは一時的にアクセスができない状況にあるか、<br>移動もしくは削除された可能性があります。</p>
            </div>
        </div>
    </div>
@endsection