
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
