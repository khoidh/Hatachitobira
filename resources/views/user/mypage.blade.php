@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('title-e', 'MY PAGE')
@section('title-j', 'マイページ')
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
                    <div class="col-sm-2 col-4 memo-text">
                        <div class="underline">&nbsp;MEMO&nbsp;</div>
                    </div>
                    <div class="col-sm-10 col-8 memo-input">
                        <input type="text" name="" class="input-memo" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"  placeholder="先月の行動を振り返り記録しよう" value="{{$mytheme_first? $mytheme_first->memo : ''}}">
                    </div>
                </div>
                <hr class="shape-8"/>
                <div class="row log">
                    <div class="col-sm-2 col-4 log-text">
                        <div class="underline">&nbsp;先月のログ&nbsp;</div>
                    </div>
                    <div class="col-sm-10 col-8 log-input">
                        <input type="text" name="" class="input-lat-log" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
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
                        <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                            <div class="panel-info-content">
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
                                            placeholder="Click edit to change content" disabled>{{isset($mythemes[$i]->content_lable) ? $mythemes[$i]->content_lable : ''}}</textarea>
                                    </span>
                                </div>
                                <div class="favorite edit label">
                                    <i class="fa fa-pencil"
                                        data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                        data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                        data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                        data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                    >
                                        Edit</i>
                                </div>
                            </div>
                        </div>
                        @else
                            {{--05--}}
                            <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                                <div class="event-image">
                                    <img src="{{isset($mythemes['9']->content_lable) ? asset('image/mypage/'.$mythemes['9']->content_lable) :asset('image/mypage/mypage-01.png')}}" alt="">
                                    <div class="description"> {{isset($mythemes['9']->content_1) ? $mythemes['9']->content_1 : 'HATACHI TOBIRA'}}</div>
                                    <div class="favorite edit image">
                                        <i class="fa fa-pencil"
                                            data-month="{{isset($mythemes['9']->month) ? $mythemes['9']->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes['9']->year) ? $mythemes['9']->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes['9']->category_id) ? $mythemes['9']->category_id : '9'}}" 
                                            data-id = "{{isset($mythemes['9']->id) ? $mythemes['9']->id : ''}}"
                                        >Edit</i>
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
                        <input type="text"  name="action-of-month" class="input-action" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="考えたいこと、行動したいことを3つ決めよう" value="{{$mytheme_first ? $mytheme_first->this_action : ''}}">
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
                        <select name="category_id" class="cb-category" required="true" autofocus>
                            <option selected disabled>あなたのカテゴリ</option>
                            {{--@foreach($categories as $category)--}}
                                {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </strong>
                    <span class="col-sm-2 col-4 category-text"><b>の新着</b></span>
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
                <span class="underline video-title">お気に入り動画({{count($videos)}})</span>
                <div class="row video-content video">
                    <div class="row video-list col-md-12">
                        <div id="carouselExampleevent123" class="carousel slide multi-item-carousel" data-ride="carousel" data-interval="false" data-wrap="false">
                            <div class="carousel-inner row mx-auto" role="listbox">
                                @forelse($videos as $key => $result)
                                    <div class=" item col-xs-12 col-sm-12 col-md-12 col-lg-12 video-detail carousel-item {{ $key == 0  ? 'active' : ''}}">
                                        <div class="wrapper">
                                            <div class="thump">
                                                <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                                    <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                                    <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                                                 </div>
                                                <a href="#">
                                                    <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                                </a>
                                            </div>
                                            <div class="description">
                                                <p>
                                                    <?php 
                                                        $title = $result->items[0]->snippet->title;
                                                        substr($title, 0,10);
                                                        echo $title. '...';
                                                    ?>
                                                </p>
                                                <span>{{$result->items[0]->statistics->viewCount}} Views /</span>
                                                <span>{{ $result->date_diff}} month ago /</span>
                                                <span>{{$result->category}}</span>
                                             </div>
                                         </div>
                                    </div>
                                @empty
                                <h4 class="data-not-found">No data found</h4>
                                @endforelse
                            </div>
                            @if(count($videos) > 3)
                            <a class="carousel-control-prev" style="display: none;" href="#carouselExampleevent123" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next text-faded" href="#carouselExampleevent123" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            @endif
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
                                @php
                                    $time_now = Carbon\Carbon::now();
                                    $time_from = Carbon\Carbon::parse($event->time_from);
                                    $time_to = Carbon\Carbon::parse($event->time_to);
                                    $check= strtotime($time_now) >= strtotime($time_from) && strtotime($time_now) <= strtotime($time_to) ? 1 : 0;
                                    if($check)
                                    $event_state="申し込み受付中";
                                    else
                                    $event_state="受付終了";
                                @endphp
                                <div class="article-status">
                                    <hr class="shape-8"/>
                                    <img class="events" 
                                        @if($check)
                                            src="{{asset('image/event/event-icon.png')}}" alt="event-icon.png"
                                        @else
                                            src="{{asset('image/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                        @endif
                                    >
                                    <span class="events" style="@if(!$check) left: 20px;@else color: #111111 @endif">{{$event_state}}</span>
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                            @php $image='image/event/'.$event->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}" alt="{{$event->title}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $event->favorite == 1 ? 'liked' : ''}}"  data-id='{{$event->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
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
                    
                            @endforelse
                        </div>
                        @if(count($columns) > 1)
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
                    <span class="more-detail">
                    <a href="{{url('event')}}"><b>イベントを探す</b><img src="{{asset('image/top/arrow-1.png')}}"></a></span>
                </div>
            </div>

            <div class="item column">
                <div class="underline column-title">お気に入り記事({{$columns->count()}})</div>
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
                                            src="{{asset('image/column/column-icon.png')}}" alt="column-icon.png"
                                        @else
                                            src="{{asset('image/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                                        @endif
                                    >
                                    <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                            @php $image='image/column/'.$column->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('image/column/event_default.jpg')}}" alt="{{$column->title}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $column->favorite == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title"><a href="{{route('column.show', $column->id)}}">{{$column->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$column->category_name}}</span></div>
                                        <div class="category" style="color: #636B6F;">
                                            <p>{{$column->category_name}}</p>
                                        </div>
                                        <div class="date" style="text-align: right">
                                            <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h4 class="data-not-found">Data not found</h4>
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
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
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
            $html +='<img class="image-register" src="{{ asset("image/register_1.png") }}">';
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

        $(document).on('click','.video .video-list .browse-details', function(e){
            e.preventDefault();
            var idvideo = $(this).data('id');
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
            }else if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExample .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-next',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(2)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: none !important');
            }else if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExampleevent .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExampleevent123 .carousel-control-next',function(){
            if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-last-child(2)') ) {
                $('#carouselExampleevent123 .carousel-control-next').attr('style','display: none !important');
            }else if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExampleevent123 .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExample .carousel-control-prev',function(){
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-last-child(1)')) {
                $('#carouselExample .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExample .carousel-control-prev').attr('style','display: none !important');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-prev',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(1)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExampleevent .carousel-control-prev').attr('style','display: none !important');
            }
        })

        $(document).on('click','#carouselExampleevent123 .carousel-control-prev',function(){
            if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-last-child(1)') ) {
                $('#carouselExampleevent123 .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExampleevent123 .carousel-control-prev').attr('style','display: none !important');
            }
        })

        if (window.innerWidth > 427) {
            $('.carousel.multi-item-carousel .carousel-item').each(function(){
                var next = $(this).next();
                if (!next.length) {
                next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i=0;i<1;i++) {
                    next=next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    next.children(':first-child').clone().appendTo($(this));
                  }
            });
        }

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

        $(document).on('change','.file-image',function(e){
            var formData = new FormData($('#form_information')[0]);
            var tmppath = URL.createObjectURL(e.target.files[0]);
            $('#tmppath').val(tmppath);
            $.ajax({
                type: 'post',
                url: '{{route("mypage.change-avatar")}}',
                dataType: "json",
                data: formData,
                async: false,
                success: function (key) {
                    $('#dissmiss_modal_show').addClass('editing');
                },
                processData: false,
                cache: false,
                contentType: false,
            });
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
            $('.event-image').find('img').attr('src',src);
            $('#dissmiss_modal_show').removeClass('editing');
            $('#show-detail-mypage').modal('hide');
        })
    });
</script>
@endsection