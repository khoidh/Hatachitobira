@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/searchcategory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="container mypage">
        <div class="select-search">
            <select class="select-box" name="select-category">
                @foreach($categories as $categorie )
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row column-search">
            <h3>コラム</h3>
            <div class="container">
                <div class="event-information">
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <img src="{{asset('image/mypage/image_mypage.png')}}" >
                                <div class="favorite">
                                    <i class="fa fa-heart-o" style="font-size:24px;"></i>
                                </div>
                            </div>
                            <div class="content clearfix" >
                                <div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>
                                <div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>
                                <div class="category clearfix"><p class="text-category">#カテゴリ</p></div>
                                <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row event-search">
            <h3>イベント</h3>
            <div class="container">
                @foreach($events as $event)
                <div class="event-information">
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <img src="{{asset('image/mypage/image_mypage.png')}}" >
                                <div class="favorite">
                                    <i class="fa fa-heart-o" style="font-size:24px;"></i>
                                </div>
                            </div>
                            <div class="content clearfix" >
                                <div class="status clearfix"><h4 class="text-status">申し込み受付中/h4></div>
                                <div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>
                                <div class="category clearfix"><p class="text-category">#カテゴリ</p></div>
                                <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <h3>イベント</h3>
            <div class="container">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <div class="wrapper">
                        <div class="thump">
                            <iframe width="350" height="270" src="//www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="description">
                            <p>
                                タイトルタイトルタイトルタイトルタイトル
                                
                            </p>

                            <span>12123 Views</span>
                            <span>7 month ago</span>
                            <strong></strong>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <div class="wrapper">
                        <div class="thump">
                            <iframe width="350" height="270" src="//www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="description">
                            <p>
                                タイトルタイトルタイトルタイトルタイトル
                                
                            </p>

                            <span>12123 Views</span>
                            <span>7 month ago</span>
                            <strong></strong>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <div class="wrapper">
                        <div class="thump">
                            <iframe width="350" height="270" src="//www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen"></iframe>
                        </div>
                        <div class="description">
                            <p>
                                タイトルタイトルタイトルタイトルタイトル
                                
                            </p>
                            <span>12123 Views</span>
                            <span>7 month ago</span>
                            <strong></strong>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection