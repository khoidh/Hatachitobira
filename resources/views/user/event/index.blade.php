@extends('layouts.app')

@section('css-add')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endsection
@section('title-e', 'Event')
@section('title-j', 'イベント')
@section('content')
    {{--<div class="row">--}}
        <div class="container">
            <div class="event row">
                {{--<div class="row">--}}
                <div class="icon col-md-12">
                    <div class="title-x">
                        <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <br>
                        <br>
                        <p>ちょっと真面目な出会いや対話を通じて</p>
                        <p>マイテーマを磨くための一歩を踏みだすイベント情報</p>
                    </div>
                    <div class="row">
                        <div class="icon-01 col-md-4">
                            <div class="col-md-12">
                                <img src="{{asset('image/event/event-01.png')}}" alt="event 01"
                                     style="width: 100%; height: auto;">
                                <p class="title">ちょっと変わった ロールモデルに出会える </p>
                                <P class="content">ベンチャー、大手、公務員、NPO、フリーランス、将来の選択肢を知ることで視野を広げる</P>
                            </div>
                        </div>
                        <div class="icon-01 col-md-4">
                            <div class="col-md-12">
                                <img src="{{asset('image/event/event-02.png')}}" alt="event 01"
                                     style="width: 100%; height: auto;">
                                <p class="title">ちょっと真面目に 同世代と対話ができる </p>
                                <P class="content">毎月20日に会って対話をする大学やバイト以外の第3のコミュニティができる</P>
                            </div>
                        </div>
                        <div class="icon-01 col-md-4">
                            <div class="col-md-12">
                                <img src="{{asset('image/event/event-03.png')}}" alt="event 01"
                                     style="width: 100%; height: auto;">
                                <p class="title">自分の個性をあらわす マイテーマを探求できる </p>
                                <P class="content">やりたいこと探しとは異なる これからの時代に合ったやり方で大学生活や将来の方向性を探る </P>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="article-list col-md-12">
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
                            <div class="article-status" style="background-image: url('{{asset('image/event/event-icon.png')}}');">{{$event_state}}</div>
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
                                        {{--==================== favorite ====================--}}
                                        <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                                        {{--@if(Auth::user())--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<div type="submit" class="favorite">--}}
                                                {{--<input type="hidden" class="favorite" value="0">--}}
                                                {{--<input type="hidden" class="user_id"--}}
                                                       {{--value="{{Auth::user()->id}}">--}}
                                                {{--<input type="hidden" class="event_id" value="{{$event->id}}">--}}
                                                {{--<div class="col-md-12 text-right">--}}
                                                    {{--@if(in_array($event->id,$favorites_id))--}}
                                                        {{--<i class="fa fa-heart-o"--}}
                                                           {{--style="font-size:24px; color: red;"></i>--}}
                                                    {{--@else--}}
                                                        {{--<i class="fa fa-heart-o"--}}
                                                           {{--style="font-size:24px; color: blue;"></i>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@else--}}
                                            {{--<div type="submit">--}}
                                                {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                                   {{--data-toggle="modal"--}}
                                                   {{--data-target="#modal_login"> </i>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                        {{--==================== /end favorite ====================--}}
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
                        <hr  width="100%" size="30px" color="#DCDCDC" style="    padding-top: 1px;
    margin: 32px 0 8px;"/>
                        <div class="paging text-center">{{ $events->links() }}</div>
                </div>
                {{--</div>--}}
                {{--<div class="row">--}}
                {{--@foreach($events as $event)--}}
                {{--<div class="item">--}}
                {{--<div class="wrapper">--}}
                {{--<div class="row myStyle">--}}
                                    {{--Left--}}
                                    {{--<div class="col-md-2 col-sm-4 col-xs-12">--}}
                                        {{--<div class="content">--}}
                                            {{--<div class="icon">--}}
                                                {{--<a href="{{route('event.show', $event->id)}}">--}}
                                                    {{--@php $image='image/event/'.$event->image; @endphp--}}
                                                    {{--<img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">--}}
                                                {{--</a>--}}

                                                {{--==================== favorite ====================--}}
                                                {{--@if(Auth::user())--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<div type="submit" class="favorite">--}}
                                                        {{--<input type="hidden" class="favorite" value="0">--}}
                                                        {{--<input type="hidden" class="user_id"--}}
                                                               {{--value="{{Auth::user()->id}}">--}}
                                                        {{--<input type="hidden" class="event_id" value="{{$event->id}}">--}}
                                                        {{--<div class="col-md-12 text-right">--}}
                                                            {{--@if(in_array($event->id,$favorites_id))--}}
                                                                {{--<i class="fa fa-heart-o"--}}
                                                                   {{--style="font-size:24px; color: red;"></i>--}}
                                                            {{--@else--}}
                                                                {{--<i class="fa fa-heart-o"--}}
                                                                   {{--style="font-size:24px; color: blue;"></i>--}}
                                                            {{--@endif--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--@else--}}
                                                    {{--<div type="submit">--}}
                                                        {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                                           {{--data-toggle="modal"--}}
                                                           {{--data-target="#modal_login"> </i>--}}
                                                    {{--</div>--}}
                                                {{--@endif--}}
                                                {{--==================== /end favorite ====================--}}

                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                    {{--Right--}}
                                    {{--<div class="col-md-10 col-sm-8 col-xs-12">--}}
                                        {{--<div class="content">--}}
                                            {{--<a href="{{route('event.show', $event->id)}}"--}}
                                               {{--style="text-decoration:none;">--}}
                                                {{--<div class="row">--}}
                                                    {{--Right--}}
                                                    {{--<div class="col-md-3 col-md-push-9">--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-1 col-sm-5 col-xs-12"></div>--}}
                                                            {{--<div class="col-md-11 col-sm-7 col-xs-12">--}}
                                                                {{--@php--}}
                                                                    {{--$time_now = Carbon\Carbon::now();--}}
                                                                    {{--$time_from = Carbon\Carbon::parse($event->time_from);--}}
                                                                    {{--$time_to = Carbon\Carbon::parse($event->time_to);--}}
                                                                    {{--$check=$time_now->between($time_from,$time_to);--}}
                                                                    {{--if($check)--}}
                                                                        {{--$event_state="申し込み受付中";--}}
                                                                    {{--else--}}
                                                                        {{--$event_state="受付終了";--}}
                                                                {{--@endphp--}}

                                                                {{--<div class="status"><h4>{{$event_state}}</h4></div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--Left--}}
                                                    {{--<div class="col-md-9 col-md-pull-3">--}}
                                                        {{--<div class="title"><h4>{{$event->title}}</h4></div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="category" style="color: #636B6F; font-weight: bold">--}}
                                                    {{--<p>{{$event->category_name}}</p></div>--}}
                                                {{--<div class="date col-md-12" style="text-align: right">--}}
                                                    {{--<p>{{date('Y-m-d', strtotime($event->created_at))}}</p>--}}
                                                {{--</div>--}}

                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<div class="text-center">{{ $events->links() }}</div>--}}
                {{--</div>--}}
            </div>
        </div>
    {{--</div>--}}
@endsection

@section('javascript-add')
    @parent
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('.favorite').click(function() {--}}
                {{--var user_id= $(this).find('.user_id').val();--}}
                {{--var event_id= $(this).find('.event_id').val();--}}
                {{--var favorite= $(this).find('.fa-heart-o');--}}
                {{--if(user_id) {--}}
                    {{--// alert($favorites_id)--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: '{{route('event.favorite')}}', // This is what I have updated--}}
                        {{--data: {user_id: user_id, event_id: event_id},--}}
                        {{--//=========--}}
                        {{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}--}}
                    {{--}).done(function (msg) {--}}
                        {{--alert(msg);--}}
                        {{--favorite.css('color', 'red');--}}
                        {{--favorite.css('disabled',true);--}}
                    {{--});--}}
                {{--}--}}
                {{--else {--}}
                    {{--// Chưa login--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection