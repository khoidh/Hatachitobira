@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('page_title', $event->title)
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のイベントページです。多様なロールモデルや同世代に出会い、普段のコミュニティでは話にくい"ちょっと真面目な対話"を通じて、マイテーマを考えてみよう。')
@section('title-e', 'Event')
@section('title-j', 'イベントに参加する')
@section('main')
    @parent
    <style>
        @media (max-width: 575.98px) {
            #app .home .main .title-lx .relative .info .absolute .title-j{
                letter-spacing: 0px;
            }
        }
        #modal_event_register .modal-header .close {
            padding: 0 !important;
            margin: -31px -34px  0 0 !important;
        }
    </style>
@endsection
@section('content')
    <div class="container event">
        <div class="row">
            <div class="tit col-sm-12">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <br>
                <p class="title">{{$event->title}}</p>
                <div class="icon-favorite">
                    <i class="heart-icon fa fa-heart-o" style="
                        @if(Auth::user() and in_array($event->id,$favorites_id))
                                color: pink !important;
                        @else
                                color: rgb(99, 107, 111) !important;
                        @endif "
                        data-id="{{$event->id}}"
                        data-user='{{Auth::user() ? Auth::user()->id : ""}}'>
                    </i>
                    <span class="heart-create-at">&nbsp&nbsp{{date('Y-m-d', strtotime($event->started_at))}}</span>
                </div>
                <hr class="shape-8"/>
            </div>

            <div class="txt col-sm-12 col-sm-12 col-xs-12">
                <div class="txt_content">
                    {!! $event->content !!}
                </div>
                <div class="txt-form">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="table-td_1" scope="row"><b>日程</b></td>
                            <td class="table-td_2">{{$event->started_at}} 〜 {{$event->closed_at}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>場所</b></td>
                            <td class="table-td_2">{{$event->address}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>概要</b></td>
                            <td class="table-td_2">{{$event->overview}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>参加費</b></td>
                            <td class="table-td_2">{{$event->entry_fee}}</td>
                        </tr>
                        <tr>
                            <td class="table-td_1" scope="row"><b>定員</b></td>
                            <td class="table-td_2">{{$event->capacity}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $form_user_register_display='none';
            if(Auth::User() && $event->eventstatus == '受付中' && $user_event_register == 0)
                $form_user_register_display = 'block';
        @endphp

        <form id="form-user-register" class="form-horizontal" action="{{route('event.update')}}" method="POST"
              style="display: {{ $form_user_register_display }}"
        >
            {{ csrf_field() }}

            <div class="row" style="margin: 30px 0 0 0; background-color: #FAFAFA; border-radius: 5px; border: #ced4da solid 1px;">
                <div class="modal-body" style="margin: 30px; ">
                    <div class="form-group">
                        <label for="school">学校・学部</label>
                        <input type="text" class="form-control" id="school" name="school" required maxlength="50" value="{{old('school')}}" 
                            @if ($errors->has('school')) autofocus @endif
                            placeholder="例) 東京大学　OO学部">
                    </div>
                    <div class="form-group">
                        <label for="school_year">学年</label>
                        <input type="text" class="form-control" id="school_year" name="school_year" required value="{{old('school_year')}}"
                            maxlength="3"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            @if ($errors->has('school_year')) autofocus @endif
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="50" value="{{old('name')}}"
                            @if ($errors->has('name')) autofocus @endif
                            placeholder="例) 山田　太郎">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">電話番号</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                               onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13 || event.charCode == 45) ? null : event.charCode >= 48 && event.charCode <= 57"
                            @if ($errors->has('phone_number')) autofocus @endif
                               required maxlength="13" placeholder="(半角英数)　例)　03-5773-6888 携帯電話番号でも可" value="{{old('phone_number')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" id="email" name="email" required
                            @if ($errors->has('email')) autofocus @endif
                            maxlength="50" placeholder="携帯アドレスでも可" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="question">ご不明点・質問など</label>
                        <textarea class="form-control" type="textarea" name="question" id="question" placeholder="" 
                            maxlength="6000" rows="7">{{old('question')}}</textarea>
                    </div>

                    <input type="hidden" name="event_id" value="{{$event->id}}">
                </div>
            </div>

        </form>

            <div class="row justify-content-center txt-btn">
                @php
                    $text_modal_show_infor="";
                @endphp
                <div class="col-sm-6">
                    @if(Auth::User())
                        @if($event->eventstatus != '受付中' && $user_event_register == 0)
                            @php
                                $text_modal_show_infor= "お申し込み期間は終了いたしました。";
                                if($event->eventstatus == '受付前')
                                   $text_modal_show_infor= "お申し込み期間前のイベントになります。\nお申し込み期間: ".$event->time_from." ~ ".$event->time_to;
                            @endphp
                            <p>{!! nl2br($text_modal_show_infor) !!}</p>
                        @elseif($event->eventstatus != '受付中' && $user_event_register == 1)
                            <button type="submit" class="btn btn-primary btn-lg btn-block" disabled>キャンセル</button>
                        @else
                            {{--Trong thời gian đăng ký--}}
                            @if($user_event_register == 0)
                                @if($event->eventstatus == '受付中')
                                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="myFunction()">送信</button>
                                @endif
                            @else
                                <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                        data-target="#modal_show_delete">キャンセル
                                </button>
                            @endif
                        @endif
                    @else
                        @if($event->eventstatus == '受付中')
                            <button type="button" class="btn btn-primary btn-lg btn-block show-modal-register-mypage">送信</button>
                        @endif
                    @endif
                </div>
            </div>
    </div>

    {{-- Modal --}}
    <div id="modal_show_infor" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog" style="margin-top:130px">
            <div class="modal-content">
                <div class="modal-body" style="text-align:center">
                    <button type="button" id="dismiss-register" class="close" data-dismiss="modal">&times;</button>
                    <div class="panel-body">
                        <h4>{{$text_modal_show_infor}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal_show_delete" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog" style="margin-top:130px">
            <div class="modal-content">
                <div class="modal-body" style="text-align:center">
                    <button type="button" id="dismiss-register" class="close" data-dismiss="modal">&times;</button>
                    <div class="panel-body">
                        <div class="row" style="padding: 30px">イベントのお申し込みをキャンセルいたします。<br>よろしいですか？</div>
                        <div class="row col-md-12"
                             style="-webkit-box-pack: center !important; justify-content: center !important;">
                            <form class="form-horizontal" action="{{ route('event.delete') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">はい</button>
                            </form>
                            <button class="btn btn-default" data-dismiss="modal" style=" margin-left: 20px">いいえ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript-add')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click','.show-modal-register-mypage',function(e){
                e.preventDefault();
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
            })

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

        function myFunction() {
            document.getElementById("form-user-register").submit();
        }
    </script>
@endsection