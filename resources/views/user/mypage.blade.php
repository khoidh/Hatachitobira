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
@section('main')
    <div class="container-fluid mypage">
        <div class="main row">
            <div class="title-lx">
                <div class="container">
                    <div class="relative row">
                        <div class="info col-md-12">
                            <span class="title-e">@yield('title-e','MY PAGE')</span>
                            <div class="absolute">
                                <p style="margin-bottom: 0">@yield('title-black')</p>
                                <p style="margin-bottom: 0"><span class="title-j"> @yield('title-j','タートル')</span>@yield('title-blackspan')</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container my-page">
        <div class="row my-page-top">
            <div class="col-sm-12 how-to-use">
                <a class="a-user" href="#">
                    <i class="fa fa-question-circle-o"></i>
                    <span class="a-user-text" >&nbsp;このパーツの使い方はこちら</span>
                </a>
            </div>
            <div class="col-sm-12 select-month">
                <h1>
                    <i class="fa fa-chevron-circle-left icon-back" data-month="{{$data_date['month'] == 1 ? '12' : $data_date['month'] - 1}}" data-year = "{{$data_date['month'] == 1 ? $data_date['year'] - 1 : $data_date['year']}}" aria-hidden="true"> </i>
                    <b>&nbsp;{{$data_date['year']}}年{{$data_date['month']}}月&nbsp;</b>
                    <i class="fa fa-chevron-circle-right icon-next" aria-hidden="true" data-month="{{$data_date['month'] == 12 ? '1' : $data_date['month'] + 1}}" data-year = "{{$data_date['month'] == 12 ? $data_date['year'] + 1 :  $data_date['year']}}"> </i>
                </h1>
            </div>
            <div class="col-sm-12 info-1">
                <div class="row memo">
                    <div class="col-sm-2 memo-text">
                        <div class="underline">&nbsp;MEMO&nbsp;</div>
                    </div>
                    <div class="col-sm-10 memo-input">
                        <textarea type="text" name="" class="input-memo" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"  placeholder="先月の行動を振り返り記録しよう"> {{$mytheme_first? $mytheme_first->memo : ''}}</textarea>
                    </div>
                </div>
                <hr class="shape-8"/>
                <div class="row log">
                    <div class="col-sm-2 log-text">
                        <div class="underline">&nbsp;先月のログ&nbsp;</div>
                    </div>
                    <div class="col-sm-10 log-input">
                        <input type="text" name="" class="input-lat-log" data-role="tagsinput" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="先月の自分を#で記録しよう　#バイト三昧　#初ボランティア" value="{{$mytheme_first ? $mytheme_first->last_log : ''}}">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 panel-info">
                <div class="row">
                    @php ($index=1) @endphp
                    @for ($i = 0; $i < 9; $i++)
                        <?php $key = $i>4 ? $i : $i+1 ?>
                        @if($i!=4)
                        <div class="col-sm-4 col-xs-4 col-4 panel-info-wrapper">
                            <div class="panel-info-content  {{$i%2 == 1 ? 'chan' : ''}}">
                                <div class="number">
                                    <span>0{{$index++}}</span>
                                </div>
                                <div class="mypage-text">
                                    <span>
                                        <textarea name="value-lable" class="edit-input-lable" 
                                            data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                            data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                            placeholder="マイテーマにつながる要素を入力しましょう" disabled>{{isset($mythemes[$i]->content_lable) ? $mythemes[$i]->content_lable : ''}}</textarea>
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
                <div class="row my-theme">
                    <div class="col-sm-3 col-5 my-theme-text">
                        <div class="underline">&nbsp;今月のマイテーマ&nbsp;</div>
                    </div>
                    <div class="col-sm-9 col-7 my-theme-input">
                        <input type="text" name="my-therme-month" class="input-my-theme" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？」" value="{{$mytheme_first ? $mytheme_first->this_mytheme : ''}}">
                    </div>
                </div>
                <hr class="shape-8"/>
                <div class="row action">
                    <div class="col-sm-3 col-5 action-text">
                        <div class="underline">&nbsp;今月のアクション &nbsp;</div>
                    </div>
                    <div class="col-sm-9 col-7 action-input">
                        <textarea style="width: 100%;border: none;" type="text" rows="2" name="action-of-month" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="考えたいこと、行動したいことを3つ決めよう" disabled>{{$mytheme_first ? $mytheme_first->this_action : ''}}</textarea>
                                    <i class="fa fa-pencil pencil-action" data-toggle="modal" data-target="#modal_action">
                                        <span>Edit</span></i>
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
                    <strong class="col-sm-10 col-8 category-input">
                        <select name="category_id" class="cb-category" id="category_id_value" required="true" autofocus>
                            <option selected disabled>あなたのカテゴリ</option>
                            @foreach($categories as $category)
                                @if(isset($cat_id))
                                <option value="{{$category->id}}" {{$category->id == $cat_id->categories_id ? 'selected' : ''}} >{{$category->name}}</option>
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </strong>
                    <span class="col-sm-2 col-4 category-text"><b>の新着</b></span>
                </div>

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
                                    <span style="@if($column_cate->type ==1) left: 50px;top: -14px; @endif">{{$column_cate->type == 1 ? 'コラム' : 'インタビュー' }}</span>
                                </div>
                                <div class="col-sm-4 wrapper-icon">
                                    <a href="{{route('column.show', $column_cate->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/column/'.$column_cate->image; @endphp
                                        <img class="image thumbnails" src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$image}}">
                                    </a>
                                </div>
                                <div class="col-sm-8 wrapper-content content-column">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{$column_cate->columnliked == 1 ? 'liked' : ''}}" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$column_cate->id}}"></i></p>
                                    <span class="text-title"><b><a style="color: #111" href="{{route('column.show', $column_cate->id)}}">{{$column_cate->title}}</a></b></span>
                                    <span class="text-category">{{$column_cate->categoryname}}</span>
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
                                    <span style="@if($event_cate->eventstatus == '受付前' || $event_cate->eventstatus == '受付終了'|| $event_cate->eventstatus == '開催終了' ) left: 48px; top: -15px; color: white !important; @endif">{{$event_cate->eventstatus}}</span>
                                </div>
                                <div class="col-sm-4 wrapper-icon">
                                    <a href="{{route('event.show', $event_cate->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/event/'.$event_cate->image; @endphp
                                        <img  class="thumbnails" src="{{file_exists($image)?asset($image): asset('images/user/event/event_default.jpg')}}" alt="{{$event_cate->title}}">
                                    </a>
                                </div>
                                <div class="col-sm-8 wrapper-content content-event">
                                    <p class="clearfix icon-favorior"><i class="fa fa-heart-o {{$event_cate->eventliked == 1? 'liked' : ''}}" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$event_cate->id}}"></i></p>
                                    <span class="text-title"><b><a style="color: #111111" href="{{route('event.show', $event_cate->id)}}">{{ $event_cate->title }}</a></b></span>
                                    <span class="text-category">{{ $event_cate->categoryname }}</span>
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
                                    <span class="text-title"><b>{{ $videos_cate->title }}</b></span>
                                    <span class="text-category">{{ $videos_cate->categoryname }}</span>
                                    <p class="text-date">{{ $videos_cate->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                </div>

                <div class="row justify-content-center form-group btn-category-list">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn_search_category">一覧を見る</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container my-page">
        <div class="group-2">
            <div class="item video1">
                <div class="underline video-title">お気に入り動画(<span class="count-video">{{count($videos)}}</span>)</div>
                <div class="row video-content video">
                    <div class="row video-list col-md-12">
                        <div class="carousel-inner carosel-video-list row mx-auto">
                            @forelse($videos as $key => $result)
                                <div class=" item col-xs-12 col-sm-12 col-md-12 col-lg-12 video-detail carousel-item {{ $key == 0  ? 'active' : ''}}">
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
                                            <span>{{$result->viewCount}} Views / {{$result->date_diff}} month ago / {{$result->category_name}}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <span class="more-detail" style="width: 100%;top: 0;">
                            <a href="{{url('video')}}" style="color: #111111;margin-left: 13px;display: -webkit-inline-box;margin-top: 30px;"><b>MORE</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>
                            @endforelse
                        </div>
                     </div>
                </div>
            </div>

            <div class="item event">
                <div class="underline event-title">参加したイベント({{$events->count()}})</div>
                <div class="event-content">
                    <div class="article-list col-md-12">
                        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                            <div class="carousel-inner row mx-auto" role="listbox">
                                @forelse($events as $key => $event)
                                <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                                    <div class="article-status">
                                        <hr class="shape-8"/>
                                        <img
                                            @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                                                src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
                                            @else
                                                src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                            @endif
                                        >
                                        <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) left: 20px; color: white !important;@else color: black !important @endif">{{$event->eventstatus}}</span>
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
                                            <div class="title"><a href="{{route('event.show', $event->id)}}">{{$event->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$event->category_name}}</span></div>
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
                                <p>社会人から話を聞いて、マイテーマ探しをしてみよう</p>
                                <span class="more-detail" style="width: 100%;top: 0;">
                                <a href="{{url('event')}}"><b>イベントを探す</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>
                                @endforelse
                            </div>
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
            </div>

            <div class="item column">
                <div class="underline column-title">お気に入り記事(<span class="column-count">{{$columns->count()}}</span>)</div>
                <div class="article-list col-md-12">
                    <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner row mx-auto" role="listbox">
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
                                    <img
                                        @if($column->type == 0)
                                            src="{{asset('images/user/column/column-icon.png')}}" alt="column-icon.png"
                                        @else
                                            src="{{asset('images/user/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                                        @endif
                                    >
                                    <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                            @php $image='images/admin/column/'.$column->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$column->title}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $column->columnliked == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title"><a href="{{route('column.show', $column->id)}}">{{$column->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$column->category_name}}</span></div>
                                        <div class="date" style="text-align: right">
                                            <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <span class="more-detail" style="width: 100%;top: 0;">
                                <a href="{{url('column')}}" style="color: #111111;"><b>MORE</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>
                            @endforelse
                        </div>
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
                    <div class="event-information-wrapper col-md-12 clearfix">
                        <div class="title-detail">
                            <span>今月のアクション</span>
                        </div>
                    </div>
                    <div class="event-information-wrapper col-md-12 clearfix">
                        <textarea style="width: 100%;border: none;" type="text" rows="3" id="action-of-month" name="action-of-month" class="input-action" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}"
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="考えたいこと、行動したいことを3つ決めよう">{{$mytheme_first ? $mytheme_first->this_action : ''}}</textarea>
                    </div>
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

        $(document).on('change','#category_id_value', function(e){
            var category_id = $(this).val();
            $.ajax({
                url: "{{ url('content-category-new?categories_id=') }}"+ category_id,
                success: function (data) {
                    console.log(data)
                     $('#content-text').html(data);
                }
            })
        })

        $(document).on('click','#btn_search_category',function(e){
            e.preventDefault();
            var category_id = $('#category_id_value').val();
            window.open("{{ url('search-category?search=') }}"+ category_id,'_blank');
        })

        $(document).on('click','.browse-details .favorite',function(e){
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
                        _this.find('.fa.fa-heart-o').addClass('liked');
                        _this.find('.fa.fa-heart-o').css('color','pink');
                    }else {
                        _this.parents('.video-detail.carousel-item').next().addClass('slick-active');
                        _this.parents('.video-detail.carousel-item').remove();
                        $('.count-video').text($('.count-video').text() - 1);
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
                        $('.column-count').text($('.column-count').text() - 1);
                        _this.parents('.article.carousel-item').next().addClass('active');
                        _this.parents('.article.carousel-item').remove();
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
            var _this = $(this);
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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
                }   
            })
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

        $('.input-lat-log').on('itemAdded', function(event) {
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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
                }
            })
        })

        $('.input-lat-log').on('itemRemoved', function(event) {
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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
                }
            })
        })

        $(document).on('focusout','.input-memo,.input-lat-log,.input-my-theme,.input-action',function(e){
            var _this = $(this);
            var year = _this.data('year');
            var month = _this.data('month');
            var text_memo = $('.input-memo').val();
            var text_last_log = $('.input-lat-log').val();
            var text_my_theme = $('.input-my-theme').val();
            var text_action= $('.input-action').val();
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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
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
            var _this = $(this);
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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
                }   
            })
        })

        $(document).on('click','.favorite.edit.label .fa-pencil',function(e){
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
                    _this.parents('.panel-info-content').find('.edit-input-lable').addClass('editing');
                }   
            })
        })

        $('#show-detail-mypage').on('shown.bs.modal', function () {
            $('#value-lable-main').focus();
        })

        $('#modal_action').on('shown.bs.modal', function () {
            $('#action-of-month').focus();
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
                }   
            })
        })

        // $(document).on('change','.file-image',function(e){
        //     var formData = new FormData($('#form_information')[0]);
        //     console.log(formData)
        //     var tmppath = URL.createObjectURL(e.target.files[0]);
        //     $('#tmppath').val(tmppath);
        //     $.ajax({
        //         type: 'post',
        //         url: '{{route("mypage.change-avatar")}}',
        //         dataType: "json",
        //         data: formData,
        //         async: false,
        //         success: function (key) {
        //             $('#dissmiss_modal_show').addClass('editing');
        //             iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
        //         },
        //         processData: false,
        //         cache: false,
        //         contentType: false,
        //     });
        // })

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
                    iziToast.success({timeout: 5000, icon: 'fa fa-chrome', title: 'OK', message: '更新いたしました'});
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
    });
</script>
@endsection