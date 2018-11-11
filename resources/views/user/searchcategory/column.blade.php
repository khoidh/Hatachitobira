@foreach($columns as $column)
    <div class="article">
        @php
            $time_now = Carbon\Carbon::now();
            $time_from = Carbon\Carbon::parse($column->time_from);
            $time_to = Carbon\Carbon::parse($column->time_to);
            $check=$time_now->between($time_from,$time_to);
            if($check)
            $column_state="申し込み受付中";
            else
            $column_state="受付終了";
        @endphp
        <div class="article-status"
             style="background-image: url('{{asset('images/user/event/event-icon.png')}}');">
            <p>{{$column_state}}</p>
        </div>
        <div class="article-content row">
            <div class="content-left col-md-4">
                <a href="{{route('event.show', $column->id)}}" style="text-decoration:none;">
                    {{--                                        <img src="{{asset('images/uver/event/event_default.jpg')}}" alt="" class="image">--}}
                    @php $image='images/admin/event/'.$column->image; @endphp
                    <img src="{{file_exists($image)?asset($image): asset('images/user/event/column_default.jpg')}}">
                </a>
            </div>
            <div class="content-right col-md-8">
                <div class="icon-favorite">
                    <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                </div>
                <div class="title">{{$column->title}}</div>
                <div class="category" style="color: #636B6F; font-weight: bold">
                    <p>{{$column->category_name}}</p>
                </div>
                <div class="date" style="text-align: right">
                    <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="paging text-center">{{ $columns->links() }}</div>