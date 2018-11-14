<div class="row column-search event">
    <h3 class="title-event">コラム</h3>
    <div class="article-list col-md-12">
        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
            <div class="carousel-inner row mx-auto" role="listbox">
                @forelse($columns as $key => $column)
                <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
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
<div class="row event-search event">
    <h3 class="title-event">イベント</h3>
    <div class="article-list col-md-12">
        <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
            <div class="carousel-inner" role="listbox">
                @forelse($events as $key => $event)
                <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                    <div class="article-status">
                        <hr class="shape-8"/>
                        <img style="top: -8px;" 
                            @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                                src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
                            @else
                                src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                            @endif
                        >
                        <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) left: 20px;top: -12px; color: white !important;@else top: -11px;left: 12px; color: black !important; @endif">{{$event->eventstatus}}</span>
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
                <h4 class="data-not-found">Data not found</h4>
                @endforelse
            </div>
            @if(count($events) > 1)

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
<div class="row video-search video">
    <h3 class="title-event">動画</h3>
     <div class="row video-list col-md-12">
        <div id="carouselExampleevent123" class="carousel slide multi-item-carousel" data-ride="carousel" data-interval="false" data-wrap="false">
            <div class="carousel-inner row mx-auto" role="listbox">
                @forelse($results as $key => $result)
                        <div style="padding: 0" class=" item col-xs-12 col-sm-12 col-md-12 col-lg-12 video-detail carousel-item {{ $key == 0  ? 'active' : ''}}">
                            <div class="wrapper">
                                <div class="thump">
                                    <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->items[0]->player->embedHtml}}' data-url = "{{$result->data_url}}">
                                        <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                        <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                                     </div>
                                    <a href="#">
                                        <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                    </a>
                                    {{-- <p class="video-title sub-title">{{ $result->items[0]->snippet->title }}</p> --}}
                                </div>
                                <div class="description">
                                    <p>{{ $result->items[0]->snippet->title }}</p>
                                    <span>{{$result->items[0]->statistics->viewCount}} Views/{{ $result->date_diff}} month ago/{{$result->category}}</span>
                                </div>
                            </div>
                        </div>
                @empty
                <h4 class="data-not-found">No data found</h4>
                @endforelse
            </div>
            @if(count($results) > 3)
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
<script type="text/javascript">
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
</script>