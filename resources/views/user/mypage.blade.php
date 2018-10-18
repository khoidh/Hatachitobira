@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('title-e', 'MY PAGE')
@section('title-j', 'マイページ')
@section('content')
    <div class="container my-page">
        <div class="row">
            <div class="col-sm-12 how-to-use">
                <a class="a-user" href="#">
                    <i class="fa fa-question-circle-o"></i>
                    <span class="a-user-text" >&nbsp;このパーツの使い方はこちら</span>
                </a>
            </div>

            <div class="col-sm-12 select-month">
                <h1>
                    <i class="fa fa-chevron-circle-left icon-back" aria-hidden="true"> </i>
                    <b>&nbsp;2018年9月&nbsp;</b>
                    <i class="fa fa-chevron-circle-right icon-next" aria-hidden="true"> </i>
                </h1>
            </div>

            <div class="col-sm-12 info-1">
                <div class="row memo">
                    <div class="col-sm-2 memo-text">
                        <div class="underline">&nbsp;MEMO&nbsp;</div>
                    </div>
                    <div class="col-sm-10 memo-input">
                        <input type="text" name="" placeholder="先月の行動を振り返り記録しよう">
                    </div>
                </div>

                <hr class="shape-8"/>

                <div class="row log">
                    <div class="col-sm-2 log-text">
                        <div class="underline">&nbsp;先月のログ&nbsp;</div>
                    </div>
                    <div class="col-sm-10 log-input">
                        <input type="text" name="" placeholder="先月の自分を#で記録しよう　#バイト三昧　#初ボランティア">
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xs-12 panel-info">
                <div class="row">
                    @php ($index=1)
                    @for ($i = 1; $i < 10; $i++)
                        @if($i!=5)
                            <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                                <div class="panel-info-content">
                                    <div class="number">
                                        <span>0{{$index++}}</span>
                                    </div>
                                    <div class="mypage-text">
                                        <span>テキストがはいりますテキストがはいりますテキストがはいりますテキストがはいります</span>
                                    </div>
                                    <div class="favorite edit">
                                        <i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage">
                                            Edit</i>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{--05--}}
                            <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                                <div class="event-image" style="background-image: url('{{asset('image/mypage/mypage-01.png')}}'); ">
                                </div>
                            </div>
                            {{--@php ($i--);--}}
                        @endif
                    @endfor
                </div>
            </div>

            <div class="col-sm-12 info-2">
                <div class="row my-theme">
                    <div class="col-sm-3 my-theme-text">
                        <div class="underline">&nbsp;今月のマイテーマ&nbsp;</div>
                    </div>
                    <div class="col-sm-9 my-theme-input">
                        <input type="text" name="" placeholder="例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？」">
                    </div>
                </div>

                <hr class="shape-8"/>

                <div class="row action">
                    <div class="col-sm-3 action-text">
                        <div class="underline">&nbsp;今月のアクションt&nbsp;</div>
                    </div>
                    <div class="col-sm-9 action-input">
                        <input type="text" name="" placeholder="考えたいこと、行動したいことを3つ決めよう">
                    </div>
                </div>

                <hr class="shape-8"/>
            </div>

        </div>
    </div>

    <div class="container-fluid my-page">
        <div class="main ">
            <div class="container group-1">
                <div class="category row">
                    <strong class="col-sm-10 category-input">
                        <select name="category_id" class="cb-category" required="true" autofocus>
                            <option selected disabled>あなたのカテゴリ</option>
                            {{--@foreach($categories as $category)--}}
                                {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </strong>
                    <span class="col-sm-2 category-text"><b>の新着</b></span>
                </div>

                <div class="content-text">
                    <div class="col-sm-12 item">
                        <div class="row wrapper">
                            <div class="wrapper-status">
                                <img
                                        src="{{asset('image/mypage/mypage-icon.png')}}" alt="column-icon.png"
                                        {{--@if($column->type == 0)--}}
                                        {{--src="{{asset('image/column/column-icon.png')}}" alt="column-icon.png"--}}
                                        {{--@else--}}
                                        {{--src="{{asset('image/column/column-visible-icon.png')}}" alt="column-visible-icon.png"--}}
                                        {{--@endif--}}
                                >
{{--                                <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>--}}
                                {{--<span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>--}}
                                <span>インタビュー</span>
                            </div>

                            <div class="col-sm-4 wrapper-icon">
                                <img src="{{asset("image/top/img-event-1.png")}}" alt="img-event-1.png">
                            </div>
                            <div class="col-sm-8 wrapper-content">
                                <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
                                <span class="text-title"><b>タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</b></span>
                                <span class="text-category">#カテゴリ</span>
                                <p class="text-date">2018.3.20</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="btn-category-list col-sm-12">--}}
                    {{--<div class="col-sm-6 col-sm-offset-3">--}}
                        {{--<button type="submit" class="btn btn-primary btn-lg btn-block">一覧を見る</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="row justify-content-center form-group btn-category-list">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">一覧を見る</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container my-page">
        <div class="group-2">
            <div class="item video1">
                <span class="underline video-title">お気に入り動画(3)</span>
                <span class="button-next-back" style="text-align: right">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <i class="fa fa-arrow-circle-o-right"></i>
                </span>

                <div class="row video-content">
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <p class="attached">892view/7month/#カテゴリ</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <p class="attached">892view/7month/#カテゴリ</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <span class="attached">892view/7month/#カテゴリ</span>
                    </div>
                </div>
            </div>

            <div class="item event">
                <div class="underline event-title">参加したイベント(0)</div>
                <div class="event-content">
                    <p>社会人から話を聞いて、マイテーマ探しをしてみよう</p>
                    <span class="more-detail"><b>イベントを探す</b></span>
                    <img src="{{asset('image/top/arrow-1.png')}}">
                </div>
            </div>

            <div class="item column">
                <div class="underline column-title">お気に入り記事({{count($columns)}})</div>
                <span class="button-next-back" style="text-align: right">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <i class="fa fa-arrow-circle-o-right"></i>
                </span>
                <div class="article">
                    @php
                        $column= $columns[0]; //temp

                        $column_state="インタビュー";
                        if($column->type == 1)
                            $column_state = "コラム";
                        else
                            $column_state = "インタビュー";
                    @endphp
                    <div class="article-status">
                        <hr class="shape-8"/>
                        <img
                                @if($column->type == 0)
                                src="{{asset('image/mypage/mypage-icon.png')}}" alt="column-icon.png"
                                @else
                                src="{{asset('image/mypage/mypage-visible-icon.png')}}" alt="column-visible-icon.png"
                                @endif
                        >
                        <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>
                    </div>

                    <div class="article-content row">
                        <div class="content-left col-md-4">
                            <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                @php $image='image/column/'.$column->image; @endphp
                                <img class="image" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}" alt="{{$image}}">
                            </a>
                        </div>
                        <div class="content-right col-md-8">
                            <div class="icon-favorite">
                                {{--==================== favorite ====================--}}
                                <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                                {{--@if(Auth::user())--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div type="submit" class="favorite">--}}
                                {{--<input type="hidden" class="favorite" value="0">--}}
                                {{--<input type="hidden" class="user_id"--}}
                                {{--value="{{Auth::user()->id}}">--}}
                                {{--<input type="hidden" class="column_id" value="{{$column->id}}">--}}
                                {{--<div class="col-md-12 text-right">--}}
                                {{--@if(in_array($column->id,$favorites_id))--}}
                                {{--<i class="fa fa-heart-o"--}}
                                {{--style="font-size:24px; color: red;"></i>--}}
                                {{--@else--}}
                                {{--<i class="fa fa-heart-o"--}}
                                {{--style="font-size:24px; color: blue;"></i>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--@else--}}
                                {{--<div type="submit">--}}
                                {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                {{--data-toggle="modal"--}}
                                {{--data-target="#modal_login"> </i>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                {{--==================== /end favorite ====================--}}
                            </div>
                            <span class="title">{{$column->title}}</span>
                            <span class="category">&nbsp;&nbsp;{{$column->category_name}}</span>
                            <div class="date" >
                                <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>

{{--<div class="my-page container">--}}
    	{{--<div class="event-information">--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>1</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span>テキストがはいりますテキストがはいりますテキストがはいりますテキストがはいります</span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>2</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>3</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>4</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
    		{{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
    			{{--<div class="event-information-content">--}}
    				{{--<div class="event-image">--}}
	    				{{--<img src="{{ asset('image/column/column02.jpg')}}">--}}
                    {{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>5</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>6</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>7</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
                {{--<div class="event-information-content">--}}
                    {{--<div class="number">--}}
                        {{--<span>8</span>--}}
                    {{--</div>--}}
                    {{--<div class="mypage-text">--}}
                        {{--<span></span>--}}
                        {{--<div class="favorite edit">--}}
                            {{--<i class="fa fa-pencil" data-toggle="modal" data-target="#show-detail-mypage"> Edit</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-8">メモ：</div>--}}
            {{--<div class="col-md-12">--}}
                {{--<input type="text" name="" style="width: 100%">--}}
            {{--</div>--}}
        {{--</div>--}}

    	{{--<div class="event-information e-vent-border">--}}
    		{{--<div class="select-item col-md-3">--}}
    			{{--<select class="">--}}
    				{{--<option value="0">あなたのカテゴリ</option>--}}
    				{{--<option value="1">あなたのカテゴリ</option>--}}
    				{{--<option value="2">あなたのカテゴリ</option>--}}
    				{{--<option value="3">あなたのカテゴリ</option>--}}
    			{{--</select>--}}

    		{{--</div>--}}
    		{{--<div class="select-item-label col-md-3" ><p>の新着</p></div>--}}
    	{{--</div>--}}
    	{{--<div class="event-information">--}}
    		{{--<div class="item">--}}
                {{--<div class="wrapper">--}}
                    {{--<div class="icon">--}}
                        {{--<img src="{{asset('image/mypage/image_mypage.png')}}" >--}}
                        {{--<div class="favorite">--}}
                        	{{--<i class="fa fa-heart-o" style="font-size:24px;"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="content clearfix" >--}}
                        {{--<div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>--}}
                        {{--<div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>--}}
                        {{--<div class="category clearfix"><p class="text-category">#カテゴリ</p></div>--}}
                        {{--<div class="date clearfix"><p class="text-date">2018.3.20</p></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

    	{{--</div>--}}
    	{{--<div class="event-information">--}}
    		{{--<div class="event-show-detail">--}}
            	{{--<button class="btn btn-default">一覧を見る</button>--}}
            {{--</div>--}}
    	{{--</div>--}}
    	{{--<div class="event-information">--}}
    		{{--<div class="panel-body">--}}
    			{{--<div class="clearfix">--}}
	    			{{--<a class="text-link" href="#">お気に入り動画(3)</a>--}}
    			{{--</div>--}}
    			{{--<div class="content-video">--}}
    				{{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
    					{{--<div class="wrapper">--}}
	                        {{--<div class="thump">--}}
	                            {{--<img class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">--}}
	                        {{--</div>--}}
	                        {{--<div class="description">--}}
	                            {{--<p>部活の先輩後輩のキス【ファーストキス】</p>--}}
	                            {{--<span>58531 Views</span>--}}
	                            {{--<span>7 month ago</span>--}}
	                        {{--</div>--}}
	                    {{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
    					{{--<div class="wrapper">--}}
	                        {{--<div class="thump">--}}
	                            {{--<img class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">--}}
	                        {{--</div>--}}
	                        {{--<div class="description">--}}
	                            {{--<p>部活の先輩後輩のキス【ファーストキス】</p>--}}
	                            {{--<span>58531 Views</span>--}}
	                            {{--<span>7 month ago</span>--}}
	                        {{--</div>--}}
	                    {{--</div>--}}
    				{{--</div>--}}
    				{{--<div class="event-information-wrapper col-lg-4 col-sm-4 col-xs-12">--}}
    					{{--<div class="wrapper">--}}
	                        {{--<div class="thump">--}}
	                            {{--<img  class="img-video" src="https://i.ytimg.com/vi/ObwNpMXlmPU/mqdefault.jpg" alt="">--}}
	                        {{--</div>--}}
	                        {{--<div class="description">--}}
	                            {{--<p>部活の先輩後輩のキス【ファーストキス】</p>--}}
	                            {{--<span>58531 Views</span>--}}
	                            {{--<span>7 month ago</span>--}}
	                        {{--</div>--}}
	                    {{--</div>--}}
    				{{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    	{{--</div>--}}

    	{{--<div class="event-information">--}}
    		{{--<div class="panel-body">--}}
    			{{--<div class="clearfix">--}}
	    			{{--<a class="text-link" href="#">イベントを探す(0)</a>--}}
    			{{--</div>--}}
    			{{--<div class="content-column">--}}
    				{{--<p>社会人から話を聞いて、マイテーマ探しをしてみよう</p>--}}
    				{{--<div class="event-show-detail">--}}
    					{{--<button class="btn btn-default">一覧を見る</button>--}}
    				{{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    	{{--</div>--}}
    	{{--<div class="event-information">--}}
    		{{--<div class="panel-body">--}}
                {{--<h4 class="text-link">参加したイベント(1)</h4>--}}
    			{{--<div class="content-text">--}}
    				{{--<div class="item">--}}
		                {{--<div class="wrapper">--}}
		                    {{--<div class="icon">--}}
		                        {{--<img src="{{asset('image/mypage/image_mypage.png')}}" >--}}
		                    {{--</div>--}}
		                    {{--<div class="content clearfix" >--}}
		                        {{--<div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>--}}
		                        {{--<div class="title clearfix "><h4 class="text-title">タイトルタイトルタイトルタイトルタイトル</h4></div>--}}
		                        {{--<div class="date clearfix"><p class="text-date">2018.3.20</p></div>--}}
		                    {{--</div>--}}
		                {{--</div>--}}
		            {{--</div>--}}
    			{{--</div>--}}
    		{{--</div>--}}
    	{{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div id="show-detail-mypage" class="modal fade modal_register" role="dialog">--}}
    {{--<div class="modal-dialog" style="margin-top:150px">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-body" style="text-align:center">--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="event-information-wrapper col-md-4 col-md-offset-4 clearfix">--}}
                        {{--<div class="event-information-content">--}}
                            {{--<div class="number">--}}
                                {{--<span class="mypage-number">1</span>--}}
                            {{--</div>--}}
                            {{--<div class="mypage-text">--}}
                                {{--<span>テキストテキストテ--}}
                                        {{--キストテキストテキ--}}
                                        {{--ストテキストテキスト--}}
                                        {{--テキスト</span>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="title-detail">--}}
                            {{--<span class="mypage-number">1</span> の要素を深掘り--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 detail-infor">--}}
                        {{--<div class="event-information-content col-md-5 col-md-offset-1">--}}
                            {{--テキストテキストテ キストテキスト--}}
                        {{--</div>--}}
                         {{--<div class="event-information-content col-md-5 col-md-offset-1">--}}
                            {{--テキストテキストテ キストテキスト--}}
                        {{--</div>--}}
                         {{--<div class="event-information-content col-md-5 col-md-offset-1">--}}
                            {{--テキストテキストテ キストテキスト--}}
                        {{--</div>--}}
                         {{--<div class="event-information-content col-md-5 col-md-offset-1">--}}
                            {{--テキストテキストテ キストテキスト--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection