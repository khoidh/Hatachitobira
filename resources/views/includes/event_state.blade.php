<div class="article-status">
    <hr class="shape-8"/>
    <img 
        @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
            src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
        @else
            src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
        @endif
    >
    <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) color: white !important;@else color: black !important; @endif">{{$event->eventstatus}}</span>
</div>