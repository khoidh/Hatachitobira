@extends('layouts.app')
@section('css-add')
    @parent
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dropzone/basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
@endsection
@section('page_title', 'マイページ')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のマイページです。月単位で、「私が、探求したいこと」であるマイテーマや、自分の行動を記録してみましょう。')
@section('title-e', 'MY PAGE')
@section('title-j', 'マイページ')
@section('body-class', 'my-page')
@section('content')
    <div class="container my-page">
        <div class="row my-page-top">
            <div class="col-sm-12 how-to-use">
                <a class="a-user" href="/column/2">
                    <i class="fa fa-question-circle-o"></i>
                    <span class="a-user-text" >&nbsp;このパーツの使い方はこちら</span>
                </a>
            </div>
            <div class="col-sm-12 select-month">
                <h1>
                    <i class="fa fa-chevron-circle-left icon-back" data-month="{{$data_date['month'] == 1 ? '12' : $data_date['month'] - 1}}" data-year = "{{$data_date['month'] == 1 ? $data_date['year'] - 1 : $data_date['year']}}" aria-hidden="true"> </i>
                    <b>&nbsp;{{$data_date['year']}}<span>年</span>{{$data_date['month']}}<span>月</span>&nbsp;</b>
                    <i class="fa fa-chevron-circle-right icon-next" aria-hidden="true" data-month="{{$data_date['month'] == 12 ? '1' : $data_date['month'] + 1}}" data-year = "{{$data_date['month'] == 12 ? $data_date['year'] + 1 :  $data_date['year']}}"> </i>
                </h1>
            </div>
            <div class="col-sm-12 info-1">
                <div class="row memo">
                    <div class="col-sm-3 memo-text">
                        <h5 class="underline-text font-weight-bold">&nbsp;先月の振り返り&nbsp;</h5>
                    </div>
                    <div class="col-sm-9 memo-input" data-toggle="modal" data-target="#modal_memo">
                        <textarea
                            type="text" name="" class="input-memo pencil-action-click"
                            placeholder="先月の行動を振り返り記録しよう" readonly
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-value = "{{$mytheme_first? $mytheme_first->memo : ''}}"
                            style="outline: 0;cursor: pointer;"
                            data-type="memo"
                        >{{ $mytheme_first ? $mytheme_first->memo : '' }}</textarea>

                        <i class="fa fa-pencil pencil-memo pencil-action-click"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-value = "{{$mytheme_first? $mytheme_first->memo : ''}}"
                            data-type="memo"
                        >
                        <span>Edit</span></i>
                    </div>
                </div>
                <hr class="shape-8"/>
            </div>
            <div class="col-sm-12 col-xs-12 panel-info">
                <div class="row">
                    @php ($index=1) @endphp
                    @for ($i = 0; $i < 9; $i++)
                        <?php $key = $i>4 ? $i : $i+1 ?>
                        @if($i!=4)
                        <div class="col-sm-4 col-xs-4 col-4 panel-info-wrapper">
                            <div class="panel-info-content  {{$i%2 == 1 ? 'chan' : ''}}"
                            	data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                            data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}">
                                <div class="number">
                                    <span>0{{$index++}}</span>
                                </div>
                                <div class="mypage-text">
                                    <span>
                                        <textarea name="value-lable" class="edit-input-lable" readonly
                                            data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                            data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                            placeholder="マイテーマにつながる要素を入力しましょう"
                                        >{{isset($mythemes[$i]->content_lable) ? $mythemes[$i]->content_lable : ''}}</textarea>
                                    </span>
                                </div>
                                <div class="favorite edit label">
                                    <i class="fa fa-pencil"
                                        data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                        data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                        data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                        data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                    >
                                        <span>Edit</span></i>
                                </div>
                            </div>
                        </div>
                        @else
                            {{--05--}}
                            <div class="col-sm-4 col-xs-4 col-4 panel-info-wrapper">
                                <div class="event-image">
                                    <img src="{{isset($mythemes['9']->content_lable) ? asset('images/user/mypage/'.$mythemes['9']->content_lable) :asset('images/user/mypage/no_image.png')}}" alt="">
                                    <div class="description"> {{isset($mythemes['9']->content_1) ? $mythemes['9']->content_1 : ''}}</div>
                                    <div class="favorite edit image">
                                        <i class="fa fa-pencil"
                                            data-month="{{isset($mythemes['9']->month) ? $mythemes['9']->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes['9']->year) ? $mythemes['9']->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes['9']->category_id) ? $mythemes['9']->category_id : '9'}}" 
                                            data-id = "{{isset($mythemes['9']->id) ? $mythemes['9']->id : ''}}"
                                        ><span> Edit</span></i>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="col-sm-12 info-2">
                <div class="row log">
                    <div class="col-sm-3 log-text">
                        <h5 class="underline-text font-weight-bold">&nbsp;自分を表す#&nbsp;</h5>
                    </div>
                    <div class="col-sm-9 log-input">
                        <input type="text" name="" class="input-lat-log" data-role="tagsinput"
                               data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}"
                               data-value="{{$mytheme_first ? $mytheme_first->last_log : ''}}"
                               data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                               placeholder="{{isset($mytheme_first->last_log) ? '' : '自分を表す#で記録しよう　#バイト三昧　#初ボランティア'}}"
                               value="{{$mytheme_first ? $mytheme_first->last_log : ''}}">
                    </div>
                </div>
                <hr class="shape-8"/>
                <div class="row my-theme">
                    <div class="col-sm-3 my-theme-text">
                        <h5 class="underline-text font-weight-bold">&nbsp;今月のマイテーマ&nbsp;</h5>
                    </div>
                    <div class="col-sm-9 my-theme-input">
                        <textarea type="text" name="my-therme-month"
                            class="input-my-theme model-textarea-edit"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-value = "{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}"
                            placeholder="例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？」"
                            data-value ="{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}"
                            data-type="theme"
                        >{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}</textarea>
                        <i class="fa fa-pencil pencil-theme">
                        <span>Edit</span></i>
                    </div>
                </div>
                <hr class="shape-8"/>
                <div class="row action">
                    <div class="col-sm-3 action-text">
                        <h5 class="underline-text font-weight-bold">&nbsp;今月のアクション &nbsp;</h5>
                    </div>
                    <div class="col-sm-9 action-input">
                        <textarea type="text" name="action-of-month"
                            class="action-of-month model-textarea-edit"
                            data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"
                            data-type="action"
                            data-value="{{$mytheme_first ? $mytheme_first->this_action : ''}}"
                            placeholder="考えたいこと、行動したいことを3つ決めよう" 
                        >{{$mytheme_first ? $mytheme_first->this_action : ''}}</textarea>
                        <i class="fa fa-pencil pencil-action">
                        <span>Edit</span></i>
                    </div>
                   
                </div>
                <hr class="shape-8"/>
            </div>
        </div>
    </div>

    <div class="container-fluid my-page">
        <div class="main ">
            <div class="container searchcategory">
            	<div class="cb-path"></div>
                <div class="title-categories-mypage"><b>自分の興味があるカテゴリー</b></div>
                <div class="row fix-mb">
                    @foreach($categories as $categorie)
                    <div class="image-category">
                        <img class="img-cat-detail {{isset($cat_id) &&  $categorie->id == $cat_id->categories_id ? 'selected' : ''}}" id="category_id_value" data-slug="{{$categorie->slug}}" data-id="{{$categorie->id}}" src="{{ asset('images/admin/category/'.$categorie->icon) }}" alt="{{$categorie->name}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container group-1">
                <div class="content-text" id="content-text">
                    @if(isset($cat_id))
                        @if(isset($column_cate))
                        <div class="col-sm-12 item">
                            <div class="row wrapper">
                                <div class="wrapper-status">
                                    <img
                                        @if($column_cate->type == 0)
                                            src="{{asset('images/user/column/column-icon.png')}}" alt="column-icon.png"
                                        @else
                                            src="{{asset('images/user/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                                        @endif
                                    >
                                    <span class="ws-text" style="@if($column_cate->type ==1) @endif">{{$column_cate->type == 1 ? 'コラム' : 'インタビュー' }}</span>
                                </div>
                                <div class="col-sm-4 wrapper-icon">
                                    <a href="{{route('column.show', $column_cate->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/column/'.$column_cate->image; @endphp
                                        <img class="image thumbnails" src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$image}}">
                                    </a>
                                </div>
                                <div class="col-sm-8 wrapper-content content-column">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{$column_cate->columnliked == 1 ? 'liked' : ''}}" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$column_cate->id}}"></i></p>
                                    <p class="text-title"><b><a style="color: #111" href="{{route('column.show', $column_cate->id)}}">{{$column_cate->title}}</a></b></p>
                                    <p class="text-category">{{$column_cate->multicategoty}}</p>
                                    <p class="text-date">{{date('Y-m-d', strtotime($column_cate->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($event_cate))
                        <div class="col-sm-12 item item-2">
                            <div class="row wrapper">
                                <div class="wrapper-status">
                                    <img
                                        @if($event_cate->eventstatus == '受付中' || $event_cate->eventstatus == '開催中')
                                            src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
                                        @else
                                            src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                        @endif
                                    >
                                    {{--<span class="ws-text" style="">{{$event_cate->eventstatus}}</span>--}}
                                    <span class="ws-text" style="@if($event->eventstatus == '受付中' || $event->eventstatus == '開催中') color: black @else color: white !important; @endif">{{$event->eventstatus}}</span>
                                </div>
                                <div class="col-sm-4 wrapper-icon">
                                    <a href="{{route('event.show', $event_cate->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/event/'.$event_cate->image; @endphp
                                        <img  class="thumbnails" src="{{file_exists($image)?asset($image): asset('images/user/event/event_default.jpg')}}" alt="{{$event_cate->title}}">
                                    </a>
                                </div>
                                <div class="col-sm-8 wrapper-content content-event">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{$event_cate->eventliked == 1? 'liked' : ''}}" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$event_cate->id}}"></i></p>
                                    <p class="text-title"><b><a style="color: #111111" href="{{route('event.show', $event_cate->id)}}">{{ $event_cate->title }}</a></b></p>
                                    <p class="text-category">{{ $event_cate->categoryname }}</p>
                                    <p class="text-date">{{date('Y-m-d', strtotime($event_cate->started_at))}}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($videos_cate))
                        <div class="col-sm-12 item item-2 video-category" data-src='{{$videos_cate->embedHtml}}' data-url="{{$videos_cate->url}}" style="cursor: pointer;">
                            <div class="row wrapper">

                                <div class="col-sm-4 wrapper-icon">
                                    <div class="browse-details">
                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                     </div>
                                    <img class="thumbnails" src="{{ $videos_cate->thumbnails }}" alt="img-event-1.png">
                                </div>
                                <div class="col-sm-8 wrapper-content content-video">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{$videos_cate->videoliked == 1? 'liked' : ''}}" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$videos_cate->id}}"></i></p>
                                    <p class="text-title"><b>{{ $videos_cate->title }}</b></p>
                                    <p class="text-category">{{ $videos_cate->categoryname }}</p>
                                    <p class="text-date">{{ $videos_cate->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="row justify-content-center form-group btn-category-list">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="round-button black lg" id="btn_search_category">新着情報をみる</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container my-page">
        <div class="group-2">
            <div class="video">
                <h2 class="underline-text font-weight-bold">お気に入り動画 <span class="count-video">({{count($videos)}})</span></h2>
                <div class="article-list video-list">
                    @if(count($videos) > 0)
                    <div class="carousel-inner carosel-video-list">
                        @forelse($videos as $key => $result)
                            <div class=" item col-12 video-detail carousel-item {{ $key == 0  ? 'active' : ''}}">
                                <div class="wrapper">
                                    <div class="thump">
                                        <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->embedHtml}}' data-url="{{$result->url}}">
                                            <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                            <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                                         </div>
                                        <a href="#">
                                            <img class="img-icon" src="{{  $result->thumbnails}}" alt="">
                                        </a>
                                    </div>
                                    <div class="description">
                                        <p>{{ $result->title }}</p>
                                        <span>{{$result->viewCount}} Views / {{$result->date_diff}} month ago / {{$result->categoryname}}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    @else
                        <p class="empty-text">多様な仕事の1日に触れ、自分の興味や視野を広げよう</p>
                        <span class="more-detail">
                            <a href="{{url('video')}}">
                                <b>動画を探す</b><img src="{{asset('images/user/top/arrow-1.png')}}">
                            </a>
                        </span>
                    @endif
                </div>
            </div>

            <div class="event">
                <h2 class="underline-text font-weight-bold">参加したイベント <span class="count-video">({{$events->count()}})</span></h2>
                <div class="article-list">
                    @if(count($events) > 0)
                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner row mx-auto" role="listbox">
                            @forelse($events as $key => $event)
                            <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                                <div class="article-status">
                                    <hr class="shape-8"/>
                                    <div class="wrapper-status">
                                        <img
                                                @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                                                src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
                                                @else
                                                src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                                @endif
                                        >
                                        {{--<span class="ws-text" style="">{{$event->eventstatus}}</span>--}}
                                        <span class="ws-text" style="@if($event->eventstatus == '受付中' || $event->eventstatus == '開催中') color: black @else color: white !important; @endif">{{$event->eventstatus}}</span>
                                    </div>

                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                            @php $image='images/admin/event/'.$event->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('images/user/event/event_default.jpg')}}" alt="{{$event->title}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $event->eventliked == 1 ? 'liked' : ''}}"  data-id='{{$event->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title"><a href="{{route('event.show', $event->id)}}">{{$event->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$event->categoryname}}</span></div>
                                        <div class="category" style="color: #636B6F;">
                                            <p>{{$event->category_name}}</p>
                                        </div>
                                        <div class="date" >
                                            <p>{{date('Y-m-d', strtotime($event->started_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>

                        @else
                            <p class="empty-text">社会人から話を聞いて、マイテーマ探しをしてみよう</p>
                            <span class="more-detail">
                                <a href="{{url('event')}}">
                                    <b>イベントを探す</b><img src="{{asset('images/user/top/arrow-1.png')}}">
                                </a>
                            </span>
                        @endif
                        @if(count($events) > 1)
                         <a class="carousel-control-prev" style="display: none;" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="event">
                <h2 class="underline-text font-weight-bold">お気に入り記事 <span class="column-count">({{$columns->count()}})</span></h2>
                <div class="article-list">
                    @if(count($columns) > 0)
                    <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner carouselExampleevent-item row mx-auto" role="listbox">
                            @forelse($columns as $key_1 => $column)
                            <div class="article carousel-item {{ $key_1 == 0 ? 'active' : ''}}">
                                @php
                                    $column_state="";
                                    if($column->type == 1)
                                        $column_state = "コラム";
                                    else
                                        $column_state = "インタビュー";
                                @endphp
                                <div class="article-status">
                                    <hr class="shape-8"/>
                                    <div class="wrapper-status">
                                        <img
                                                @if($column->type == 0)
                                                src="{{asset('images/user/column/column-icon.png')}}" alt="column-icon.png"
                                                @else
                                                src="{{asset('images/user/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                                                @endif
                                        >
                                        <span class="ws-text" style="@if($column->type ==1)  @endif">{{$column_state}}</span>
                                    </div>
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                            @php $image='images/admin/column/'.$column->image; @endphp
                                            <img class="image" src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$column->title}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $column->columnliked == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title"><a href="{{route('column.show', $column->id)}}">{{$column->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$column->multicategoty}}</span></div>
                                        <div class="date" style="text-align: right">
                                            <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>

                        @else
                            <p class="empty-text">マイテーマをみつけるノウハウ、イベントレポートを見てみよう</p>
                            <span class="more-detail">
                                <a href="{{url('column')}}"><b>記事を探す</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a>
                            </span>
                        @endif
                        @if(count($columns) > 1)
                         <a class="carousel-control-prev" style="display: none;" href="#carouselExampleevent" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExampleevent" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
<div id="show-detail-mypage" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" id="dissmiss_modal_show">&times;</button>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_action" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_video" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:50px">
        <div class="modal-content" style="border-radius: 13px;">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">
                </div>
                <div class="share">
                    <span class="article">シェアする</span>
                    <span><a class="twitter social-share" href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                    <span><a class="facebook social-share" href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                </div>
            </div>
        </div>
    </div>   
</div>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/dropzone/dropzone.min.js') }}"></script>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        $(this).scrollTop(0);
        $("#modal_video").on('hide.bs.modal', function(){
            $("iframe").attr('src', '');
        });
        $('.carousel-inner.carosel-video-list').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;"></button>',
            prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;"></button>',
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            ]
        });


        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++){
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }

        tech = GetURLParameter('redirect-link');
        if (tech == 'true') {
            $html = '<div class ="form-register-last">'
            $html += '<div class="form-group">';
            $html +='<h3>会員登録が完了しました!</h3>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">マイテーマを探すために、</label>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">気になる動画の収集や、個人の活動の記録を</label>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">管理していきましょう。</label>';
            $html +=' </div>';
            $html += '<div class="form-group" style="margin-bottom: 28px; margin-top: 30px;">';
            $html +='<img class="image-register" src="{{ asset("images/register_1.png") }}">';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html += '<div class="col-md-12">'
            $html +='<a  class="btn btn-warning" href="{{route("mypage.index")}}">MY PAGEへ</a>';
            $html +=' </div>';
            $html +=' </div>';
            $html +=' </div>';
            $('#modal_register').find('.panel-body').addClass('form-horizontal');
            $('#modal_register').find('.panel-body').html($html);
            $('#modal_register').modal('show');
        }

        $(document).on('click','#category_id_value', function(e){
            var category_id = $(this).data('id');
            var _this = $(this);
            $.ajax({
                url: "{{ url('content-category-new?categories_id=') }}"+ category_id,
                success: function (data) {
                    $('#category_id_value.selected').removeClass('selected');
                    $('#content-text').html(data);
                    _this.addClass('selected');
                }
            })
        })

        $(document).on('click','#btn_search_category',function(e){
            e.preventDefault();
            var category_id = $('#category_id_value').data('slug');
            window.location.href = "{{ url('search-category') }}"+'/' +category_id;
        })

        $(document).on('click','.browse-details .favorite',function(e){
            e.stopPropagation();
            var idvideo = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            var _number = $('.count-video').text() - 1;
            $.ajax({
                url : '{{route("video.favorite")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    video_id : idvideo,
                    user_id: user
                },
                success : function (result){
                     if (result == 'ok') {
                        _this.find('.fa.fa-heart-o').addClass('liked');
                        _this.find('.fa.fa-heart-o').css('color','pink');
                    }else {
                        _this.parents('.video-detail.carousel-item').next().addClass('slick-active');
                        _this.parents('.video-detail.carousel-item').remove();

                        $('.count-video').text(_number);
                        if (_number == 0) {
                            $('.carousel-inner.carosel-video-list').html('<span class="more-detail"><a href="{{url('video')}}" style="color: #111111;margin-left: 0;display: -webkit-inline-box;margin-top: 12px;"><b>MORE</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>');
                        }
                    }
                }   
            })
            
        })

        $(document).on('click','#carouselExample .fa.fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            if (user == '') {
                $html = '';
                    $html +='<div class="form-group code-top">';
                        $html +='<div class="col-md-5" style="display: none;">';
                        $html +='<p class="title-register"></p>';
                        $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                        $html +='</div>';
                        $html +='<img src="{{ asset("images/register_mypage.png") }}">';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                        $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
                        $html +='</div>';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                        $html +='<div class="col-md-12">';
                            $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
                        $html +='</div>';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                        $html +='<div class="col-md-12">';
                            $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
                        $html +='</div>';
                    $html +='</div>';
                    $('#modal_register').find('.panel-body').html($html);
                    $('#modal_register').modal('show');
            }else {
                $.ajax({
                    url : '{{route("event.favorite")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        video_id : idevent,
                        user_id: user
                    },
                    success : function (result){
                        if (result == 'ok') {
                            _this.addClass('liked');
                            _this.css('color','pink');
                        }else {
                            _this.removeClass('liked');
                            _this.css('color','#636B6F');
                        }
                    }   
               })
            }
        })


        $(document).on('click','#carouselExampleevent .fa.fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            var number = $('.column-count').text() - 1;
            $.ajax({
                url : '{{route("column.favorite")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    column_id : idevent,
                    user_id: user
                },
                success : function (result){
                    if (result == 'ok') {
                        _this.addClass('liked');
                        _this.css('color','pink');
                    }else {
                        $('.column-count').text(number);
                        _this.parents('.article.carousel-item').next().addClass('active');
                        _this.parents('.article.carousel-item').remove();
                        if (number == 0) {
                            $('.carouselExampleevent-item').html('<span class="more-detail"><a href="{{url('column')}}" style="color: #111111;margin-left: 0;display: -webkit-inline-box;margin-top: 30px;"><b>MORE</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>');
                        }
                    }
                }   
           })
            
        })

        $(document).on('click','.content-video .fa-heart-o',function(e){
            e.stopPropagation();
            var idvideo = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            
            $.ajax({
                url : '{{route("video.favorite")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    video_id : idvideo,
                    user_id: user
                },
                success : function (result){
                    if (result == 'ok') {
                        _this.addClass('liked');
                        _this.css('color','pink');
                    }else {
                         _this.removeClass('liked');
                         _this.css('color','636B6F');
                    }
                }   
           })
        })

        $(document).on('click','.content-event .fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            
            $.ajax({
                url : '{{route("event.favorite")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    video_id : idevent,
                    user_id: user
                },
                success : function (result){
                    if (result == 'ok') {
                        _this.addClass('liked');
                        _this.css('color','pink');
                    }else {
                        _this.removeClass('liked');
                        _this.css('color','#636B6F');
                    }
                }   
           })
        })

        $(document).on('click','.content-column .fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            
                $.ajax({
                    url : '{{route("column.favorite")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        column_id : idevent,
                        user_id: user
                    },
                    success : function (result){
                        if (result == 'ok') {
                            _this.addClass('liked');
                            _this.css('color','pink');
                        }else {
                            _this.removeClass('liked');
                            _this.css('color','#636B6F');
                        }
                    }   
               })
        })

        $(document).on('click','.video .video-list .browse-details,.video-category', function(e){
            e.preventDefault();
            var src = $(this).data('src');
            var url = $(this).data('url');
            $('#modal_video .twitter').attr('href','https://twitter.com/intent/tweet?url='+url);
            $('#modal_video .facebook').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
            $('#modal_video .panel-body').html(src);
            $('#modal_video').modal('show');
        });

        var popupMeta = {
            width: 400,
            height: 400
        }

        $(document).on('click', '.social-share', function(event){
            event.preventDefault();

            var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

            var url = $(this).attr('href');
            var popup = window.open(url, 'Social Share',
                'width='+popupMeta.width+',height='+popupMeta.height+
                ',left='+vPosition+',top='+hPosition+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                return false;
            }
        });

        $(document).on('click','#carouselExample .carousel-control-next',function(){
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-last-child(2)')) {
                $('#carouselExample .carousel-control-next').attr('style','display: none !important');
            }
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExample .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-next',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(2)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: none !important');
            }
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExampleevent .carousel-control-prev').css('display','block');
            }
        })

       
        $(document).on('click','#carouselExample .carousel-control-prev',function(){
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-last-child(1)')) {
                $('#carouselExample .carousel-control-next').attr('style','display: block !important');
            }
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExample .carousel-control-prev').attr('style','display: none !important');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-prev',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(1)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: block !important');
            }
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExampleevent .carousel-control-prev').attr('style','display: none !important');
            }
        })

        

        $(document).on('focusout','.edit-input-lable',function(e){
            var year = $(this).data('year');
            var month = $(this).data('month');
            var category = $(this).data('category');
            var id = $(this).data('id');
            var text = $(this).val();
            var text_old = $(this).data('value');
            var _this = $(this);
            if (text.trim() != text_old.trim()) {
                $.ajax({
                    url : '{{route("mypage.change-lable")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        year : year,
                        month : month,
                        category_id : category,
                        id : id,
                        content_lable: text
                    },
                    success : function (result){
                        _this.attr('data-category',result.category_id);
                        _this.attr('data-id',result.id);
                        _this.parents('.panel-info-content').find('.favorite.edit').find('.fa-pencil').attr('data-category',result.category_id);
                        _this.parents('.panel-info-content').find('.favorite.edit').find('.fa-pencil').attr('data-id',result.id);
                        iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});
                    }   
                })
            }
        })

        iziToast.settings({
          timeout: 3000, // default timeout
          resetOnHover: true,
          // icon: '', // icon class
          transitionIn: 'flipInX',
          transitionOut: 'flipOutX',
          position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
          onOpen: function () {
            console.log('callback abriu!');
          },
          onClose: function () {
            console.log("callback fechou!");
          }
        });

        function emptyInputLogPlaceholder () {
            var text_last_log = $('.input-lat-log').val();
            if (text_last_log.length < 1) {
                $('.input-lat-log').parent('.log-input').find('input').each(function(index, element) {
                    $(element).attr('placeholder', '先月の自分を#で記録しよう　#バイト三昧　#初ボランティア');
                });
            } else {
                $('.input-lat-log').parent('.log-input').find('input').each(function(index, element) {
                    $(element).attr('placeholder', '');
                });
            }
        }

        $(document).on('itemAdded','.input-lat-log', function(event) {
            var year = $('.input-lat-log').data('year');
            var month = $('.input-lat-log').data('month');
            var text_memo = $('.input-memo').val();
            var text_last_log = $('.input-lat-log').val();
            var text_last_log_old = $('.input-lat-log').data('value');
            var text_my_theme = $('.input-my-theme').val();
            var text_action= $('.input-action').val();
            console.log(text_last_log+','+$(this).val());
            if (text_last_log.trim() != text_last_log_old.trim()) {
                $.ajax({
                    url : '{{route("mypage.change-content")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        year : year,
                        month : month,
                        memo : text_memo,
                        last_log : text_last_log,
                        this_mytheme: text_my_theme,
                        this_action: text_action
                    },success:function(data) {
                        emptyInputLogPlaceholder();
                        iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});
                    }
                })
            }
        })

        $(document).on('itemRemoved','.input-lat-log', function(event) {
            var year = $('.input-lat-log').data('year');
            var month = $('.input-lat-log').data('month');
            var text_memo = $('.input-memo').val();
            var text_last_log = $('.input-lat-log').val();
            var text_my_theme = $('.input-my-theme').val();
            var text_action= $('.input-action').val();
            console.log(text_last_log+','+$(this).val());
            $.ajax({
                url : '{{route("mypage.change-content")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    year : year,
                    month : month,
                    memo : text_memo,
                    last_log : text_last_log,
                    this_mytheme: text_my_theme,
                    this_action: text_action
                },success:function(data) {
                    emptyInputLogPlaceholder();
                    iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});
                }
            })
        })

        $(document).on('focusout','.edit-input-content',function(e){
            var year = $(this).data('year');
            var month = $(this).data('month');
            var category = $(this).data('category');
            var content = $(this).data('content');
            var id = $(this).data('id');
            var text = $(this).val();
            var text_old = $(this).data('value');
            var _this = $(this);

            if (text.trim() !=  text_old.trim()) {
                $.ajax({
                    url : '{{route("mypage.change-content-child")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        year : year,
                        month : month,
                        category_id : category,
                        id : id,
                        content_data: text,
                        content: content
                    },
                    success : function (result){
                        _this.parents('.detail-infor').find('.edit-input-content').attr('data-id',result.id);
                        iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});
                    }   
                })
            }
        })

        $(document).on('click','.panel-info-content',function(e){
            e.preventDefault();
            var _this = $(this);
            var year = _this.data('year');
            var month = _this.data('month');
            var id = _this.data('id');
            var category = $(this).data('category');
            $.ajax({
                url : '{{route("mypage.show-modal")}}',
                type: 'post',
                dataType: 'html',
                data: {
                    year : year,
                    month : month,
                    category_id : category,
                    id : id
                },
                success : function (result){
                    $('#show-detail-mypage').find('.panel-body').html(result);
                    $('#show-detail-mypage').modal('show');
                    _this.find('.edit-input-lable').addClass('editing');
                }   
            })
        })

        $(document).on('click','.favorite.edit.image .fa-pencil',function(e){
            e.preventDefault();
            var _this = $(this);
            var year = _this.data('year');
            var month = _this.data('month');
            var id = _this.data('id');
            var category = $(this).data('category');
            $.ajax({
                url : '{{route("mypage.show-modal-image")}}',
                type: 'post',
                dataType: 'html',
                data: {
                    year : year,
                    month : month,
                    category_id : category,
                    id : id
                },
                success : function (result){
                    $('#show-detail-mypage').find('.panel-body').html(result);
                    $('#show-detail-mypage').modal('show');
                    // _this.parents('.panel-info-content').find('.edit-input-lable').addClass('editing');
                }   
            })
        })


        $(document).on('click','#dissmiss_modal_show',function(e){
            e.preventDefault();
            var text = $('#show-detail-mypage').find('.edit-input-lable').val();
            $('.edit-input-lable.editing').val(text);
            $('.edit-input-lable.editing').removeClass('editing');
            $('#show-detail-mypage').modal('hide');
        })

        $(document).on('click','.fa.fa-chevron-circle-left.icon-back, .fa.fa-chevron-circle-right',function(e) {
            e.preventDefault();
            var _this = $(this);
            var month = _this.data('month');
            var year = _this.data('year');
            $.ajax({
                url : '{{route("mypage.show-month")}}',
                type: 'post',
                dataType: 'html',
                data: {
                    year : year,
                    month : month
                },
                success : function (result){
                    $('.row.my-page-top').html(result);
                    emptyInputLogPlaceholder();
                }   
            })
        })

        $(document).on('focusout','.image-description',function(e){
            var formData = new FormData($('#form_information')[0]);
            $.ajax({
                type: 'post',
                url: '{{route("mypage.change-avatar")}}',
                dataType: "json",
                data: formData,
                async: false,
                success: function (key) {
                    $('#dissmiss_modal_show').addClass('editing');
                    iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});
                },
                processData: false,
                cache: false,
                contentType: false,
            });
        })

        $(document).on('click','#dissmiss_modal_show.editing',function(e){
            e.preventDefault();
            var text = $('#show-detail-mypage').find('.image-description').val();
            var src = $('#tmppath').val();
            $('.description').text(text);
            $('.event-image').find('img').attr('src',"{{ asset('images/user/mypage')}}"+"/"+src);
            $('#dissmiss_modal_show').removeClass('editing');
            $('#show-detail-mypage').modal('hide');
        })
        $('#show-detail-mypage').on('hide.bs.modal', function(){
            var text = $('#show-detail-mypage').find('.image-description').val();
            var src = $('#tmppath').val();
            if (typeof value === "undefined") {
                src = $('.event-image img').attr('src');
                $('.event-image').find('img').attr('src',src);
            }else {
                $('.event-image').find('img').attr('src',"{{ asset('images/user/mypage')}}"+"/"+src);
            }
            if (typeof text === "undefined") {
                
                text = $('.event-image .description').text();
            }
                $('.description').text(text);
                $('#dissmiss_modal_show').removeClass('editing');
           
        });

        $(document).on('click','.pencil-action-click', function(e) {
            e.preventDefault();
            var month = $(this).data('month');
            var year = $(this).data('year');
            var typies = $(this).data('type');
            $.ajax({
                url : '{{route("mypage.change-content-get")}}',
                type: 'post',
                dataType: 'html',
                data: {
                    year : year,
                    month : month,
                    typies : typies
                },success:function(data) {
                    $('#modal_action .panel-body').html(data);
                    $('#modal_action').modal('show');
                }
            })
        })

        $(document).on('focusout','.model-textarea-edit',function(e){
    
            var _this = $(this);
            var _year = _this.data('year');
            var _month = _this.data('month');
            var _type = _this.data('type');

            var text_memo = _type == 'memo' ? _this.val() : $('.input-memo').val();
            var text_memo_old = _type == 'memo' ? _this.data('value') : $('.input-memo').data('value');

            var text_last_log = $('.input-lat-log').val();

            var text_my_theme = _type == 'theme' ? _this.val() : $('.input-my-theme').val();
            var text_my_theme_old = _type == 'theme' ? _this.data('value') : $('.input-my-theme').data('value');

            var text_action = _type == 'action' ? _this.val() : $('.action-of-month').val();
            var text_action_old = _type == 'action' ? _this.data('value') : $('.action-of-month').data('value');


            if (text_memo.trim() != text_memo_old.trim() || text_my_theme.trim()  != text_my_theme_old.trim() || text_action.trim() !=text_action_old.trim()) {
                $.ajax({
                    url : '{{route("mypage.change-content")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        year : _year,
                        month : _month,
                        memo : text_memo,
                        last_log : text_last_log,
                        this_mytheme: text_my_theme,
                        this_action: text_action
                    },success:function(data) {
                        $('.input-memo').text(data.memo);
                        $('.input-my-theme').text(data.this_mytheme);
                        $('.action-of-month').text(data.this_action);
                        setTextareaHeight($('.action-of-month'));
                        setTextareaHeight($('.input-my-theme'));
                        iziToast.success({timeout: 1500, iconUrl: '/images/site_icon.png', title: 'OK', message: '更新いたしました', progressBar: false});

                        
                    }
                })
            }
        })

        var setTextareaHeight = function(textarea) {
            var lineHeight = parseInt(textarea.css('lineHeight'));
            var lines = (textarea.val() + '\n').match(/\n/g).length;
            textarea.height(lineHeight * lines);
        }
        setTextareaHeight($('.action-of-month'));
        setTextareaHeight($('.input-my-theme'));

    });
</script>
@endsection