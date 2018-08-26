@extends('layouts.app')
@section('content')
    <div class="row">
        <h3>イベント</h3>
        <div class="container">
            <div class="event">
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <!-- <a href=""> -->
{{--                                    <img src="{{asset('image/event/'.$event->image)}}" >--}}
                                @php $image='image/event/'.$event->image; @endphp
                                <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">

                                    @if(Auth::user())
                                    <a href=""><i class="fa fa-heart-o" style="font-size:24px;"></i></a>
                                    @else
                                        <i class="fa fa-heart-o" style="font-size:24px;" data-toggle="modal" data-target="#modal_login"> </i>
                                    @endif
                                <!-- </a> -->
                            </div>
                            <div class="content">
                                <div class="status">

                                    {{-- TODO xử lý check thời gian đăng ký--}}

                                    <h4>申し込み受付中
                                    </h4>
                                </div>
                                <div class="title">
                                    <p>
                                        <?php echo $event->title?>
                                    </p>
                                </div>
                                <div class="category">
                                    <p>カテゴリ
                                    </p>
                                </div>
                                <div class="date">
                                    <p>
                                        <?php echo $event->time_from?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            {{--  Xử lý đăng ký event--}}
            @if(Auth::user())
            <form method="POST"  action="{{route('event.update')}}">
                {{ csrf_field() }}
                <input type="hidden" name="register" value="1">
                <input type="hidden" name="user_id" value="<?php if(Auth::user()) echo Auth::user()->id?>">
                <input type="hidden" name="event_id" value="<?php echo $event->id?>">
                <button type="submit"  class="btn btn-info">申し込む</button>
            </form>
            @else
                <button type="submit"  class="btn btn-info" data-toggle="modal" data-target="#modal_login">申し込む</button>
            @endif
        </div>

    </div>

@endsection