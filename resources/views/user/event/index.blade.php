@extends('layouts.app')

@section('css-add')
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    @parent
    <style type="text/css">
        @media (max-width: 575.98px) {
            #app .home .main .title-lx .relative .info .absolute .title-j{
                letter-spacing: 0px;
            }
        }

        /*.my-active span{*/
            /*background-color: yellow !important;*/
            /*color: black !important;*/
            /*border-color: yellow !important;*/
        /*}*/
    </style>
@endsection
@section('title-e', 'Event')
@section('title-j', 'イベントに参加する')
@section('content')
    <div class="container event">
        <div class="row">
            <div class="icon col-md-12">
                <div class="title-x">
                    <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <br>
                    <p>ちょっと真面目な出会いや対話を通じて</p>
                    <p>マイテーマを磨くための一歩を踏みだすイベント情報</p>
                </div>
                <div class="row">
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('image/event/event-01.png')}}" alt="event 01.png">
                            <p class="icon-title">ちょっと変わった ロールモデルに出会える </p>
                            <P class="icon-content">ベンチャー、大手、公務員、NPO、フリーランス、将来の選択肢を知ることで視野を広げる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('image/event/event-02.png')}}" alt="event 02.png">
                            <p class="icon-title">ちょっと真面目に 同世代と対話ができる </p>
                            <P class="icon-conten">毎月20日に会って対話をする大学やバイト以外の第3のコミュニティができる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('image/event/event-03.png')}}" alt="event 03.png">
                            <p class="icon-title">自分の個性をあらわす マイテーマを探求できる </p>
                            <P class="icon-conten">やりたいこと探しとは異なる これからの時代に合ったやり方で大学生活や将来の方向性を探る </P>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-article-list col-md-12">
                @foreach($events as $event)
                    <div class="article">
                        @php
                            $time_now = Carbon\Carbon::now();
                            $time_from = Carbon\Carbon::parse($event->started_at);
                            $time_to = Carbon\Carbon::parse($event->closed_at);
                            $check=$time_now->between($time_from,$time_to);
                            if($check)
                            $event_state="申し込み受付中";
                            else
                            $event_state="受付終了";
                        @endphp
                        <div class="article-status">
                            <hr class="shape-8"/>
                            <img
                                @if($check)
                                    src="{{asset('image/event/event-icon.png')}}" alt="event-icon.png"
                                @else
                                    src="{{asset('image/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                @endif
                            >
                            <span style="@if(!$check) left: 20px; @endif">{{$event_state}}</span>
                        </div>
                        <div class="article-content row">
                            <div class="content-left col-md-4">
                                <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
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
                                        {{--<div type="button" class="favorite">--}}
                                            {{--<input type="hidden" class="favorite" value="0">--}}
                                            {{--<input type="hidden" class="user_id"--}}
                                                   {{--value="{{Auth::user()->id}}">--}}
                                            {{--<input type="hidden" class="event_id" value="{{$event->id}}">--}}
                                            {{--<span class="col-md-12 text-right">--}}
                                                {{--<i class="fa fa-heart-o"--}}
                                                   {{--style="font-size:24px;--}}
                                                   {{--@if(in_array($event->id,$favorites_id))--}}
                                                           {{--color: pink;--}}
                                                   {{--@else--}}
                                                           {{--color: rgb(99, 107, 111);--}}
                                                   {{--@endif--}}
                                                           {{--"></i>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--@else--}}
                                        {{--<div type="button">--}}
                                            {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                               {{--data-toggle="modal"--}}
                                               {{--data-target="#modal_login"> </i>--}}
                                        {{--</div>--}}
                                    {{--@endif--}}
                                    {{--==================== /end favorite ====================--}}
                                </div>
                                <span class="title">{{$event->title}}</span>
                                <span class="category">&nbsp;&nbsp;{{$event->category_name}}</span>
                                <div class="date" >
                                    <p>{{date('Y-m-d', strtotime($event->started_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <hr class="shape-8"/>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                        <ul class="pagination" role="navigation">
                            @include('includes.pagination', ['paginator' => $events])
                        </ul>
                    </div>

            </div>
        </div>

        <div class="pagination-link">
{{--            {{ $events->links('vendor.pagination.custom') }}--}}
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
@endsection

@section('javascript-add')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $(document).on('click','.icon-favorite .fa-heart-o', function(e) {
                e.stopPropagation();
                var user_id = $(this).data('user');
                var event_id = $(this).data('id');
                var _this = $(this);
                if(user_id) {
                    $.ajax({
                        url : '{{route("event.favorite")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            video_id : event_id,
                            user_id: user_id
                        },
                        success : function (result){
                            if (result == 'ok') {
                                _this.addClass('liked');
                                _this.css('color','pink');
                            }else {
                                _this.removeClass('liked');
                                _this.css('color','#636B6F');
                            }
                        }
                   })
                }
                else {
                    $html = '';
                    $html +='<div class="form-group code-top">';
                        $html +='<div class="col-md-5">';
                        $html +='<p class="title-register">動画やイベント、あなたの興味のあるものを貯めて、マイテーマを作っていこう！</p>';
                        $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                        $html +='</div>';
                        $html +='<img src="{{ asset("image/picture1.png") }}">';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                        $html +='<div class="col-md-10 col-md-offset-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/private-polisy">利用規約</a> と <a class="link-redirect" href="/private-polisy">プライバシーポリシー</a> に同意する </label>';
                        $html +='</div>';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                        $html +='<div class="col-md-12">';
                            $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
                        $html +='</div>';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                        $html +='<div class="col-md-12">';
                            $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
                        $html +='</div>';
                    $html +='</div>';
                    $('#modal_register').find('.panel-body').html($html);
                    $('#modal_register').modal('show');
                }
            });
            $(document).on('click', '.pagination .page-link', function (e) {

                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $.ajax({
                    type: "GET",
                    url: '?page=' + page,
                    data:{page:page},
                    success:function(data){
                        // console.log(data);
                        $('body').html(data);
                        // $('body,html').animate({scrollTop: 0}, 'slow');
                        $('body,html').animate({scrollTop: 0});
                    }
                })
            });
        })
    </script>
@endsection