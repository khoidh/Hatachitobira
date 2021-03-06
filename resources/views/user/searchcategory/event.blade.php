
    @foreach($events as $event)
   <div class="article">
        @php
            $time_now = Carbon\Carbon::now();
            $time_from = Carbon\Carbon::parse($event->time_from);
            $time_to = Carbon\Carbon::parse($event->time_to);
            $check=$time_now->between($time_from,$time_to);
            if($check)
            $event_state="申し込み受付中";
            else
            $event_state="受付終了";
        @endphp
        <div class="article-status"
             style="background-image: url('{{asset('image/event/event-icon.png')}}');">
            <p>{{$event_state}}</p>
        </div>
        <div class="article-content row">
            <div class="content-left col-md-4">
                <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                    {{--                                        <img src="{{asset('image/event/event_default.jpg')}}" alt="" class="image">--}}
                    @php $image='image/event/'.$event->image; @endphp
                    <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                </a>
            </div>
            <div class="content-right col-md-8">
                <div class="icon-favorite">
                    <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                </div>
                <div class="title">{{$event->title}}</div>
                <div class="category" style="color: #636B6F; font-weight: bold">
                    <p>{{$event->category_name}}</p>
                </div>
                <div class="date" style="text-align: right">
                    <p>{{date('Y-m-d', strtotime($event->created_at))}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <hr width="100%" size="30px" color="#DCDCDC" style="    padding-top: 1px;margin: 32px 0 8px;"/>
    <div class="paging text-center">{{ $events->links() }}</div>

