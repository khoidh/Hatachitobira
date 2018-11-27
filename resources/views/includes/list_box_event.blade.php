<div class="c-list_box article">
    <div class="article-status">
        <hr class="shape-8"/>
        <img
            @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
            @else
                src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
            @endif
        >
        {{--<span style="">{{$event->eventstatus}}</span>--}}
        <span style="@if($event->eventstatus == '受付中' || $event->eventstatus == '開催中') color: black @else color: white !important; @endif">{{$event->eventstatus}}</span>
    </div>
    <div class="article-content row">
        <div class="content-left col-md-4">
            <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                @php $image='images/admin/event/'.$event->image; @endphp
                <img src="{{file_exists($image)?asset($image): asset('images/user/event//event_default.jpg')}}" alt="{{$event->title}}">
            </a>
        </div>
        <div class="content-right col-md-8">
            <div class="icon-favorite">
                {{--==================== favorite ====================--}}
                <i class="fa {{$event->eventliked == 1 ? 'fa-heart' : 'fa-heart-o'}}" style="font-size:24px;"
                   data-id="{{$event->id}}"
                   data-user='{{Auth::user() ? Auth::user()->id : ""}}'
                   data-table="events">
                </i>
                {{--==================== /end favorite ====================--}}
            </div>
            <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                <span class="title">{{$event->title}}</span>
                <span class="category">&nbsp;&nbsp;{{$event->categoryname}}</span>
            </a>
            <div class="date" >
                <p>{{$event->started_at->format(config('const.ymd'))}}</p>
            </div>
        </div>
    </div>
</div>