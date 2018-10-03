@extends('layouts.app')

@section('title-e', 'Category Search')
@section('title-j', 'カテゴリー検索')
@section('content-top')
    <div class="row-category">
        <div class="select-search">
            <select class="select-box search" name="select-category">
                @foreach($categories as $categorie )
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
        </div>
    </div>  
@endsection
@section('content')
<div class="row searchcategory">
        <div class="row column-search event">
            <h3 class="title-event">コラム</h3>
            <div class="article-list col-md-12">
                @foreach($columns as $column)
                <div class="article">
                    @php
                        $time_now = Carbon\Carbon::now();
                        $time_from = Carbon\Carbon::parse($column->time_from);
                        $time_to = Carbon\Carbon::parse($column->time_to);
                        $check=$time_now->between($time_from,$time_to);
                        if($check)
                        $column_state="申し込み受付中";
                        else
                        $column_state="受付終了";
                    @endphp
                    <div class="article-status"
                         style="background-image: url('{{asset('image/event/event-icon.png')}}');background-size: 100%;">
                        <p>{{$column_state}}</p>
                    </div>
                    <div class="article-content row">
                        <div class="content-left col-md-4">
                            <a href="{{route('event.show', $column->id)}}" style="text-decoration:none;">
                                
                                @php $image='image/event/'.$column->image; @endphp
                                <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                            </a>
                        </div>
                        <div class="content-right col-md-8">
                            <div class="icon-favorite">
                                <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                            </div>
                            <div class="title">{{$column->title}}</div>
                            <div class="category" style="color: #636B6F; font-weight: bold">
                                <p>{{$column->category_name}}</p>
                            </div>
                            <div class="date" style="text-align: right">
                                <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="paging text-center">{{ $columns->links() }}</div>
            </div>
        </div>
        <div class="row event-search event">
            <h3 class="title-event">イベント</h3>
                <div class="article-list col-md-12">
                    @foreach($events as $event)
                   <div class="article">
                        @php
                            $time_now = Carbon\Carbon::now();
                            $time_from = Carbon\Carbon::parse($event->time_from);
                            $time_to = Carbon\Carbon::parse($event->time_to);
                            $check=$time_now->between($time_from,$time_to);
                            if($check)
                            $event_state="申し込み受付中";
                            else
                            $event_state="受付終了";
                        @endphp
                        <div class="article-status"
                             style="background-image: url('{{asset('image/event/event-icon.png')}}'); background-size: 100%;">
                            <p>{{$event_state}}</p>
                        </div>
                        <div class="article-content row">
                            <div class="content-left col-md-4">
                                <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                    {{--                                        <img src="{{asset('image/event/event_default.jpg')}}" alt="" class="image">--}}
                                    @php $image='image/event/'.$event->image; @endphp
                                    <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                                </a>
                            </div>
                            <div class="content-right col-md-8">
                                <div class="icon-favorite">
                                    <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                                </div>
                                <div class="title">{{$event->title}}</div>
                                <div class="category" style="color: #636B6F; font-weight: bold">
                                    <p>{{$event->category_name}}</p>
                                </div>
                                <div class="date" style="text-align: right">
                                    <p>{{date('Y-m-d', strtotime($event->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr width="100%" size="30px" color="#DCDCDC" style="    padding-top: 1px;margin: 32px 0 8px;"/>
                <div class="paging text-center">{{ $events->links() }}</div>
            </div>
        </div>
        <div class="row video-search video">
            <h3 class="title-event">動画</h3>
             <div class="row video-list">
                @foreach($results as $result)
                    @if(isset($result->items[0]))
                    <div class="col-lg-4 col-sm-4 col-md-4 video-detail">
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
                                        substr($title, 0,20);
                                        echo $title. '...';
                                    ?>
                                </p>
                                <span>{{$result->items[0]->statistics->viewCount}} Views /</span>
                                <span>7 month ago /</span>
                                <span>{{$result->category}}</span>
                             </div>
                         </div>
                    </div>
                    @endif
                @endforeach
                <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                    {{ $results->links() }}
                 </div>
             </div>
              <div class="pagination video-pagination">
                  {{ $results->links() }}
              </div>
        </div>
</div>

 <div id="modal_video" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content" style="width: 515px;border-radius: 13px;">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>   
</div>

<script type="text/javascript" async defer>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(document).on('click','.video .video-list .browse-details', function(e){
            e.preventDefault();
            var idvideo = $(this).data('id');
            var src = $(this).data('src');
            $('#modal_video .panel-body').html(src);
            $('#modal_video').modal('show');
        });

        $(document).on('change','.select-box.search',function(e){
            console.log('aaaaa');
            url = "{{URL::to('search-category') }}?search=" + $(this).val();
            window.location.href=url;
        })

        $(document).on('click','.page-link',function(e){
            e.preventDefault();
            var category = $('.select-box.search').val();
            var page = $(this).attr('href').split('page=')[1];
            if ($(this).parent().parent().parent().parent().parent().hasClass("column-search")) {
                $.ajax({
                    url : '{{url("paginate-column?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.column-search').find('.article-list.col-md-12').html(data);
                });
            }else if($(this).parent().parent().parent().parent().parent().hasClass("event-search")) {
                console.log('aa')
                $.ajax({
                    url : '{{url("paginate-event?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.event-search').find('.article-list.col-md-12').html(data);
                });
            }
            else if($(this).parent().parent().parent().parent().hasClass("video-search")) {
                $.ajax({
                    url : '{{url("paginate-video?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.video-search').find('.row.video-list').html(data);
                });
            }
        });

        $(document).on('click','.browse-details .favorite',function(e){
            e.stopPropagation();
            var idvideo = $(this).data('id');
            var user = $(this).data('user');
            var _this = $(this);
            if (user == '') {
                $('#modal_login').modal('show');
            }else {
                $.ajax({
                    url : '{{route("video.favorite")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        video_id : idvideo,
                        user_id: user
                    },
                    success : function (result){
                        _this.find('.fa.fa-heart-o').addClass('like');
                        _this.find('.fa.fa-heart-o').css('color','pink');
                    }   
               })
            }
        })
    })
</script>
@endsection
