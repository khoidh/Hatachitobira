@forelse($videos as $result)
    <?php 
        $title = $result->title;
        substr($title, 0,20);
    ?>
    <div class="col-lg-4 col-sm-4 col-md-4 video-detail">
        <div class="wrapper">
            <div class="thump">
                <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                    <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                    <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                </div>
                <a href="#">
                    <img class="img-icon" src="{{  $result->thumbnails}}" alt="">
                </a>
                {{-- <p class="video-title sub-title">{{ $title }} {{strlen($result->title) > 50 ? '...' : ''}}</p> --}}
            </div>
            <div class="description">
                <p>{{ $title }} {{strlen($result->title) > 50 ? '...' : ''}}</p>
                <span>{{$result->viewCount}} Views /{{ $result->date_diff }} month ago /{{$result->category_name}}</span>
            </div>
        </div>
    </div>
@empty
    <h4 class="data-not-found">Data not found</h4>
@endforelse
<div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
    <ul class="pagination" role="navigation">
        @include('includes.pagination', ['paginator' => $videos])
    </ul>
</div>