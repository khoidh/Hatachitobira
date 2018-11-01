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
            <span style="@if($column->type ==1) left: 25px; @endif">{{$column->type == 1 ? 'コラム' : 'インタビュー' }}</span>
        </div>
        <div class="col-sm-4 wrapper-icon">
            <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                @php $image='image/column/'.$column->image; @endphp
                <img class="image" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}" alt="{{$image}}">
            </a>
        </div>
        <div class="col-sm-8 wrapper-content">
            <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
            <span class="text-title"><b>タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</b></span>
            <span class="text-category">#カテゴリ</span>
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
            <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) left: 20px; color: white !important; @endif">{{$event->eventstatus}}</span>
        </div>
        <div class="col-sm-4 wrapper-icon">
            <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                @php $image='image/event/'.$event->image; @endphp
                <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}" alt="{{$event->title}}">
            </a>
        </div>
        <div class="col-sm-8 wrapper-content">
            <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
            <span class="text-title"><b><a href="{{route('event.show', $event->id)}}">{{ $event->title }}</a></b></span>
            <span class="text-category">{{ $event->categoryname }}</span>
            <p class="text-date">{{date('Y-m-d', strtotime($event->started_at))}}</p>
        </div>
    </div>
</div>
@endif
@if(isset($videos) )
<div class="col-sm-12 item item-2">
    <div class="row wrapper">
        <div class="wrapper-status">
            <img  src="{{asset('image/mypage/mypage-icon.png')}}" alt="column-icon.png">
            <span></span>
        </div>

        <div class="col-sm-4 wrapper-icon">
            <img src="{{ $videos->thumbnails }}" alt="img-event-1.png">
        </div>
        <div class="col-sm-8 wrapper-content">
            <p class="clearfix icon-favorior"><i class="fa fa-heart-o" style="font-size: 24px;"></i></p>
            <span class="text-title"><b>{{ $videos->title }}</b></span>
            <span class="text-category">{{ $videos->categoryname }}</span>
            <p class="text-date">{{ $videos->created_at }}</p>
        </div>
    </div>
</div>
@endif