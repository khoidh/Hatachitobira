<div class="searchcategory">
    <div class="event">
        <h2 class="underline-text font-weight-bold">コラム</h2>
        <div class="article-list">
            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                <div class="carousel-inner row mx-auto" role="listbox">
                    @forelse($columns as $key => $column)
                    <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                        @include('includes/column_state', compact('column'))
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
                                    <p>#{{$column->category_name}}</p>
                                </div>
                                <div class="date" style="text-align: right">
                                    <p>{{date('Y.m.d', strtotime($column->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4 class="data-not-found">登録データがありません。</h4>
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
    <div class="event">
        <h2 class="underline-text font-weight-bold">イベント</h2>
        <div class="article-list">
            <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                <div class="carousel-inner" role="listbox">
                    @forelse($events as $key => $event)
                    <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                        @include('includes/event_state', compact('event'))
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
                                    <p>#{{$event->category_name}}</p>
                                </div>
                                <div class="date" >
                                    <p>{{date('Y.m.d', strtotime($event->started_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4 class="data-not-found">登録データがありません。</h4>
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
    <div class="video">
        <h2 class="underline-text font-weight-bold">動画</h2>
        <div class="video-list">
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
    <script src="{{ asset('assets/slick/slick.min.js') }}"></script>
<script type="text/javascript" async defer>
    $(document).ready(function(){
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
    });
</script>