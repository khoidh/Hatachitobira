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
    <ul class="pagination" role="navigation">
        @include('includes.pagination', ['paginator' => $results])
    </ul>
</div>