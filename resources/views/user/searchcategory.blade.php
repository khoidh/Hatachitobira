@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/searchcategory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="container mypage">
        <div class="select-search">
            <select class="select-box search" name="select-category">
                @foreach($categories as $categorie )
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row column-search">
            <h3>コラム</h3>
            <div class="container">
                @foreach($columns as $column)
                <div class="event-information">
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <a href="{{route('column.show', $column->id)}}">
                                    @php $image='image/column/'.$column->image; @endphp
                                    <img class="image-column" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">
                                    <div class="favorite">
                                        <i class="fa fa-heart-o" style="font-size:24px;"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="content clearfix" >
                                <div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>
                                <div class="title clearfix "><h4 class="text-title">{{$column->title}}</h4></div>
                                <div class="category clearfix"><p class="text-category">{{$column->category_name}}</p></div>
                                <div class="date clearfix"><p class="text-date">{{date('Y.m.d',strtotime($column->created_at))}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $columns->links() }}
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
                                <a href="{{route('event.show', $event->id)}}">
                                    <img class="image-event" src="{{asset('image/event/'.$event->image)}}" >
                                </a>
                                <div class="favorite">
                                    <i class="fa fa-heart-o" style="font-size:24px;"></i>
                                </div>
                            </div>
                            <div class="content clearfix" >
                                <div class="status clearfix"><h4 class="text-status">申し込み受付中/h4></div>
                                <div class="title clearfix "><h4 class="text-title">{{$event->title}}</h4></div>
                                <div class="category clearfix"><p class="text-category">{{$event->category_name}}</p></div>
                                <div class="date clearfix"><p class="text-date">{{date('Y.m.d',strtotime($event->created_at))}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $events->links() }}
            </div>
        </div>
        <div class="row video-search">
            <h3>動画</h3>
            <div class="container">
                @foreach($results as $result)
                    @if(isset($result->items[0]))
                    <div class="col-md-4 col-sm-4 portfolio-item">
                        <div class="wrapper">
                            <div class="thump video">
                                {!! $result->items[0]->player->embedHtml !!}
                            </div>
                            <div class="description">
                                <p>
                                    {{ substr($result->items[0]->snippet->title, 0,20). '...' }}
                                </p>

                                <span>{{$result->items[0]->statistics->viewCount}} Views</span>
                                <span>7 month ago</span>
                                <strong>{{ $result->category }}</strong>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                {{ $results->links() }}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(document).on('change','.select-box.search',function(e){
            url = "{{URL::to('search-category') }}" + "?search=" + $(this).val();
            window.location.href=url;
        })

        $(document).on('click','.page-link',function(e){
            e.preventDefault();
            var category = $('.select-box.search').val();
            var page = $(this).attr('href').split('page=')[1];
            if ($(this).parent().parent().parent().parent().hasClass("column-search")) {
                $.ajax({
                    url : '{{url("paginate-column?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.column-search').find('.container').html(data);
                });
            }else if($(this).parent().parent().parent().parent().hasClass("event-search")) {
                console.log('aa')
                $.ajax({
                    url : '{{url("paginate-event?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.event-search').find('.container').html(data);
                });
            }
            else if($(this).parent().parent().parent().parent().hasClass("video-search")) {
                $.ajax({
                    url : '{{url("paginate-video?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.video-search').find('.container').html(data);
                });
            }
        });
    })
</script>
@endsection
