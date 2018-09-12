@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event.css') }}" rel="stylesheet">
    <style>
        .content {
            height: 100% !important;
        }

        .status {
            padding: 1px;
            background: #90EE90;
            width: auto;
            text-align: center !important;
        }

        .col-md-2.col-sm-4.col-xs-12,
        .col-md-10.col-sm-8.col-xs-12 {
            height: 100% !important;
            padding: 0 !important;
        }

        .date {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        /*Cho điện thoại*/
        @media (max-width: 767px) {
            .myStyle {
                max-height: 100%;
                height: 100%;
            }
        }

        /*Cho điện laptop, ipad*/
        @media (min-width: 768px ) {
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <h3>イベント</h3>
        <div class="container">
            <div class="event">
                <div class="row">
                    <div class="info col-md-12">
                        <p>ちょっと真面目な出会いや対話を通じて</p>
                        <p>マイテーマを磨くための一歩を踏みだすイベント情報</p>
                        <p><img class="text-center" src="{{asset("image/event_stamp.jpg")}}" alt="" width="800" height="413" scale="0"></p>
                    </div>
                </div>
                <div class="row">
                    @foreach($events as $event)
                        <div class="item">
                            <div class="wrapper">
                                <div class="row myStyle">
                                    {{--Left--}}
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                        <div class="content">
                                            <div class="icon">
                                                <a href="{{route('event.show', $event->id)}}">
                                                    @php $image='image/event/'.$event->image; @endphp
                                                    <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                                                </a>

                                                {{--==================== favorite ====================--}}
                                                @if(Auth::user())
                                                    {{ csrf_field() }}
                                                    <div type="submit" class="favorite">
                                                        <input type="hidden" class="favorite" value="0">
                                                        <input type="hidden" class="user_id"
                                                               value="{{Auth::user()->id}}">
                                                        <input type="hidden" class="event_id" value="{{$event->id}}">
                                                        <div class="col-md-12 text-right">
                                                            @if(in_array($event->id,$favorites_id))
                                                                <i class="fa fa-heart-o"
                                                                   style="font-size:24px; color: red;"></i>
                                                            @else
                                                                <i class="fa fa-heart-o"
                                                                   style="font-size:24px; color: blue;"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <div type="submit">
                                                        <i class="fa fa-heart-o" style="font-size:24px;"
                                                           data-toggle="modal"
                                                           data-target="#modal_login"> </i>
                                                    </div>
                                                @endif
                                                {{--==================== /end favorite ====================--}}

                                            </div>
                                        </div>

                                    </div>

                                    {{--Right--}}
                                    <div class="col-md-10 col-sm-8 col-xs-12">
                                        <div class="content">
                                            <a href="{{route('event.show', $event->id)}}"
                                               style="text-decoration:none;">
                                                <div class="row">
                                                    {{--Right--}}
                                                    <div class="col-md-3 col-md-push-9">
                                                        <div class="row">
                                                            <div class="col-md-1 col-sm-5 col-xs-12"></div>
                                                            <div class="col-md-11 col-sm-7 col-xs-12">
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

                                                                <div class="status"><h4>{{$event_state}}</h4></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--Left--}}
                                                    <div class="col-md-9 col-md-pull-3">
                                                        <div class="title"><h4>{{$event->title}}</h4></div>
                                                    </div>
                                                </div>

                                                <div class="category" style="color: #636B6F; font-weight: bold">
                                                    <p>{{$event->category_name}}</p></div>
                                                <div class="date col-md-12" style="text-align: right">
                                                    <p>{{date('Y-m-d', strtotime($event->created_at))}}</p>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">{{ $events->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript-add')
    @parent
    <script>
        $(function () {
            $('.favorite').click(function() {
                var user_id= $(this).find('.user_id').val();
                var event_id= $(this).find('.event_id').val();
                var favorite= $(this).find('.fa-heart-o');
                if(user_id) {
                    // alert($favorites_id)
                    $.ajax({
                        type: "POST",
                        url: '{{route('event.favorite')}}', // This is what I have updated
                        data: {user_id: user_id, event_id: event_id},
                        //=========
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    }).done(function (msg) {
                        alert(msg);
                        favorite.css('color', 'red');
                        favorite.css('disabled',true);
                    });
                }
                else {
                    // Chưa login
                }
            });
        })
    </script>
@endsection