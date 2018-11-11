@extends('layouts.app')

@section('css-add')
    @parent
@endsection
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

        <div class="row justify-content-center txt-btn">
            <div class="col-sm-6">
                @if(Auth::User())
                    @if($event->eventstatus != '受付中' && $user_event_register == 0)
                        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                data-target="#modal_show_infor">送信
                        </button>
                    @elseif($event->eventstatus != '受付中' && $user_event_register == 1)
                        <button type="submit" class="btn btn-primary btn-lg btn-block" disabled>キャンセル</button>
                    @else
                        @if($user_event_register == 0)
                            <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                    data-target="#modal_event_register">送信
                            </button>

                            {{--<form class="form-horizontal" action="{{route('event.update')}}" method="POST">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input type="hidden" name="event_id" value="{{$event->id}}">--}}
                                {{--<button type="submit" class="btn btn-primary btn-lg btn-block">送信</button>--}}
                            {{--</form>--}}
                        @else
                            <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                    data-target="#modal_show_delete">キャンセル
                            </button>
                        @endif
                    @endif
                @else
                    <button type="button" class="btn btn-primary btn-lg btn-block show-modal-register-mypage">送信</button>
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
                        <h4>お申し込み期間は終了いたしました。</h4>
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
                        <div class="row" style="padding: 30px">イベントのお申し込みはキャンセルされています。よろしいでしょうか。</div>
                        <div class="row col-md-12"
                             style="-webkit-box-pack: center !important; justify-content: center !important;">
                            <form class="form-horizontal" action="{{ route('event.delete') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Yes</button>
                            </form>
                            <button class="btn btn-default" data-dismiss="modal" style=" margin-left: 20px"> No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <div id="modal_event_register" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"><b>イベント申し込み</b></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('event.update')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="school">学校・学部</label>
                            <input type="text" class="form-control" id="school" name="school" required maxlength="50" placeholder="例) 東京大学　OO学部">
                        </div>
                        <div class="form-group">
                            <label for="school_year">学年</label>
                            <input type="text" class="form-control" id="school_year" name="school_year" required maxlength="3"
                                   onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="name">氏名</label>
                            <input type="text" class="form-control" id="name" name="name" required maxlength="50" placeholder="例) 山田　太郎">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">電話番号</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" required maxlength="200" placeholder="(半角英数)　例)　03-5773...">
                        </div>
                        <div class="form-group">
                            <label for="mail_address">Email:</label>
                            <input type="email" class="form-control" id="mail_address" name="mail_address" required maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="question">ご不明点・質問など</label>
                            <textarea class="form-control" type="textarea" name="question" id="question" placeholder="" maxlength="6000" rows="7"></textarea>
                        </div>

                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">送信</button>
                    </form>
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
                $html +='<div class="col-md-5">';
                $html +='<p class="title-register">イベント参加・個人ページの利用は会員限定です。さあ、マイテーマを探そ</p>';
                $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                $html +='</div>';
                $html +='<img src="{{ asset("images/picture1.png") }}">';
                $html +='</div>';
                $html +='<div class="form-group">';
                $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
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
                    $html +='<div class="col-md-5">';
                    $html +='<p class="title-register">イベント参加・個人ページの利用は会員限定です。さあ、マイテーマを探そ</p>';
                    $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                    $html +='</div>';
                    $html +='<img src="{{ asset("images/picture1.png") }}">';
                    $html +='</div>';
                    $html +='<div class="form-group">';
                    $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
                    $html +='<div class="col-md-10 offset-md-1" style="text-align: left;">';
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
        })
    </script>
@endsection