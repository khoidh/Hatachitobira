@extends('layouts.app')

@section('css-add')
    @parent
    <style type="text/css">
        @media (max-width: 575.98px) {
            #app .home .main .title-lx .relative .info .absolute .title-j{
                letter-spacing: 5px;
            }
            .home .main .title-lx .container .relative .info .title-e {
                /*margin-left: -5px;*/
                /*font-size: 55px;*/
                position: relative;
                top: -140px;
                font-size: 49px;
            }
            .home .main .title-lx .container .relative .info .absolute .title-j {
                font-size: 30px;
                letter-spacing: 8px;
            }
            .home .main .title-lx {
                min-height: 90px;
                height: 90px;
            }

            .home .main .title-lx .container .relative .info {
                /*margin-top: -30px !important;*/
                /*line-height: 95%;*/
                margin-top: 85px;
                line-height: 1.5;
            }
            .home .main .title-lx .container .relative .info .absolute {
                /*bottom: 0;*/
                /*top: 95px;*/
                /*left: 10px;*/
                bottom: 125px;
            }
            .home .main {
                min-height: 75px;
            }
            .home .main .title-lx {
                height: 120px;
                min-height: unset;
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
                            <img src="{{asset('images/user/event/event-01.png')}}" alt="event 01.png">
                            <p class="icon-title">ちょっと変わった ロールモデルに出会える </p>
                            <P class="icon-content">ベンチャー、大手、公務員、NPO、フリーランス、将来の選択肢を知ることで視野を広げる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('images/user/event/event-02.png')}}" alt="event 02.png">
                            <p class="icon-title">ちょっと真面目に 同世代と対話ができる </p>
                            <P class="icon-conten">毎月20日に会って対話をする大学やバイト以外の第3のコミュニティができる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('images/user/event/event-03.png')}}" alt="event 03.png">
                            <p class="icon-title">自分の個性をあらわす マイテーマを探求できる </p>
                            <P class="icon-conten">やりたいこと探しとは異なる これからの時代に合ったやり方で大学生活や将来の方向性を探る </P>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-article-list col-md-12">
                @foreach($events as $event)
                    <div class="article">
                        <div class="article-status">
                            <hr class="shape-8"/>
                            <img
                                @if($event->eventstatus == '受付中' || $event->eventstatus == '開催中')
                                    src="{{asset('images/user/event/event-icon.png')}}" alt="event-icon.png"
                                @else
                                    src="{{asset('images/user/event/event-visible-icon.png')}}" alt="event-visible-icon.png"
                                @endif
                            >
                            <span style="@if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) left: 20px; color: white !important; @endif">{{$event->eventstatus}}</span>
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
                                    <i class="fa fa-heart-o" style="
                                        @if(Auth::user() and in_array($event->id,$favorites_id))
                                                color: pink !important;
                                        @else
                                                color: rgb(99, 107, 111) !important;
                                        @endif "
                                           data-id="{{$event->id}}"
                                           data-user='{{Auth::user() ? Auth::user()->id : ""}}'>
                                    </i>
                                    {{--==================== /end favorite ====================--}}
                                </div>
                                <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                    <span class="title">{{$event->title}}</span>
                                    <span class="category">&nbsp;&nbsp;{{$event->category_name}}</span>
                                </a>
                                <div class="date" >
                                    <p>{{date('Y-m-d', strtotime($event->started_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr class="shape-8"/>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                    <ul class="pagination pagination-lg" role="navigation">
                        @include('includes.pagination', ['paginator' => $events])
                    </ul>
                </div>

            </div>
        </div>

        {{--<div class="pagination-link">--}}
            {{--{{ $events->links('vendor.pagination.custom') }}--}}
        {{--</div>--}}
    </div>
@endsection

@section('javascript-add')
    <script type="text/javascript"  async defer>
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
                        $html +='<div class="col-md-5" style="display: none;">';
                        $html +='<p class="title-register"></p>';
                        $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                        $html +='</div>';
                        $html +='<img src="{{ asset("images/register_love.png") }}">';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                        $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
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
        })
    </script>
@endsection