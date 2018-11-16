@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('page_title', 'イベントに参加する')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のイベントページです。多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう。')
@section('title-e', 'Event')
@section('title-j', 'イベントに参加する')
@section('body-class', 'event-page')
@section('content')
    <div class="container event">
        <div class="row">
            <div class="icon col-md-12">
                <div class="title-x">
                    <div class="cb-path"></div>
                    <span>ちょっと真面目な出会いや対話を通じて</span>
                    <br>
                    <span>マイテーマを磨くための一歩を踏みだすイベント情報</span>
                </div>
                <div class="row">
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('images/user/event/img-event-0-1.png')}}" alt="event 01.png">
                            <div class="jladev_stt_1"></div>
                            <p class="icon-title jladev_even_text">ちょっと変わった <br/>ロールモデルに出会える </p>
                            <P class="icon-content jladev_even_text">ベンチャー、大手、公務員、NPO、フリーランス、将来の選択肢を知ることで視野を広げる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('images/user/event/img-event-0-2.png')}}" alt="event 02.png">
                            <div class="jladev_stt_2"></div>
                            <p class="icon-title jladev_even_text">ちょっと真面目に <br/> 同世代と対話ができる </p>
                            <P class="icon-conten jladev_even_text">毎月20日に会って対話をする大学やバイト以外の第3のコミュニティができる</P>
                        </div>
                    </div>
                    <div class="icon-01 col-md-4">
                        <div class="col-md-12">
                            <img src="{{asset('images/user/event/img-event-0-3.png')}}" alt="event 03.png">
                            <div class="jladev_stt_3"></div>
                            <p class="icon-title jladev_even_text">自分の個性をあらわす <br/> マイテーマを探求できる </p>
                            <P class="icon-conten jladev_even_text">やりたいこと探しとは異なる これからの時代に合ったやり方で大学生活や将来の方向性を探る </P>
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
                            <span style="">{{$event->eventstatus}}</span>
                            {{-- @if($event->eventstatus == '受付前' || $event->eventstatus == '受付終了'|| $event->eventstatus == '開催終了' ) color: white !important; @endif --}}
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
                        $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
                            $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                            $html +='<label class="lblcheckbox"><a class="link-redirect" href="/privacy-policy">利用規約</a> と <a class="link-redirect" href="/privacy-policy">プライバシーポリシー</a> に同意する </label>';
                            $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                            
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