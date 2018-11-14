@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/p404.css') }}" rel="stylesheet">
@endsection
@section('page_title', 'お探しのページは見つかりませんでした')
@section('main')
    <div class="container-fluid p-404">
        <div class="main row">
            <div class="title-lx">
                <div class="container">
                    <div class="relative row">
                        <div class="info col-md-12">
                            <span class="title-e">404 file not found</span>
                            <div class="absolute">
                                <p><span class="title-j"> お探しのページは見つかりません</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container p-404">
        <div class="row">
            <div class="col-xs-12">
                <p>お探しのページは一時的にアクセスができない状況にあるか、<br>移動もしくは削除された可能性があります。</p>
            </div>
        </div>
    </div>
@endsection