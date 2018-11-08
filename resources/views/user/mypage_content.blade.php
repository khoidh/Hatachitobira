@if(isset($column) )
<div class="col-sm-12 item">
    <div class="row wrapper">
        <div class="wrapper-status">
            <img
                @if($column->type == 0)
                    src="{{asset('image/column/column-icon.png')}}" alt="column-icon.png"
                @else
                    src="{{asset('image/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                @endif
            >
            <span style="@if($column->type ==1) left: 50px; @endif">{{$column->type == 1 ? 'コラム' : 'インタビュー' }}</span>
        </div>
        <div class="col-sm-4 wrapper-icon">
            <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                @php $image='image/column/'.$column->image; @endphp
                <img class="image thumbnails" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}" alt="{{$image}}">
            </a>
        </div>
        <div class="col-sm-8 wrapper-content content-column">
            <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$column->id}}"></i></p>
            <span class="text-title"><b><a style="color: #111" href="{{route('column.show', $column->id)}}">{{$column->title}}</a></b></span>
            <span class="text-category">{{ $column->categoryname }}</span>
            <p class="text-date">{{date('Y-m-d', strtotime($column->created_at))}}</p>
        </div>
    </div>
</div>
@endif
@if(isset($event))
<div class="col-sm-12 item item-2">
    <div class="row wrapper">
        <div class="wrapper-status">
            <img
                @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                    src="{{asset('image/event/event-icon.png')}}" alt="event-icon.png"
                @else
                    src="{{asset('image/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                @endif
            >
            <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) left: 48px; color: white !important; @else color: black !important @endif">{{$event->eventstatus}}</span>
        </div>
        <div class="col-sm-4 wrapper-icon">
            <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                @php $image='image/event/'.$event->image; @endphp
                <img class="thumbnails" src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}" alt="{{$event->title}}">
            </a>
        </div>
        <div class="col-sm-8 wrapper-content content-event">
            <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$event->id}}"></i></p>
            <span class="text-title"><b><a style="color: #111" href="{{route('event.show', $event->id)}}">{{ $event->title }}</a></b></span>
            <span class="text-category">{{ $event->categoryname }}</span>
            <p class="text-date">{{date('Y-m-d', strtotime($event->started_at))}}</p>
        </div>
    </div>
</div>
@endif
@if(isset($videos) )
<div class="col-sm-12 item item-2 video-category" data-src='{{$videos->embedHtml}}' data-url="{{$videos->url}}" style="cursor: pointer;">
    <div class="row wrapper">
        <div class="col-sm-4 wrapper-icon">
            <div class="browse-details">
                <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
             </div>
            <img class="thumbnails" src="{{ $videos->thumbnails }}" alt="img-event-1.png">
        </div>
        <div class="col-sm-8 wrapper-content content-video">
            <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;" data-user = "{{Auth::User()->id}}" data-id = "{{$videos->id}}"></i></p>
            <span class="text-title"><b>{{ $videos->title }}</b></span>
            <span class="text-category">{{ $videos->categoryname }}</span>
            <p class="text-date">{{ $videos->created_at }}</p>
        </div>
    </div>
</div>
@endif