@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('page_title', $column->title)
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のコラムページです。「私が、探求したいこと」であるマイテーマをみつけるノウハウ・イベントレポート・アラハタ世代の活躍を発信していきます。')
@section('title-e', 'Column')
@section('title-j', 'コラム')
@section('content')
    <div class="container column">
        <div class="row">
            <div class="tit col-md-12 col-sm-12 col-xs-12">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <br>
                <p class="title">{{$column->title}}</p>
                <div class="icon-favorite">
                    <i class="heart-icon fa fa-heart-o" style="
                        @if(Auth::user() and in_array($column->id,$favorites_id))
                                color: pink !important;
                        @else
                                color: rgb(99, 107, 111) !important;
                        @endif "
                           data-id="{{$column->id}}"
                           data-user='{{Auth::user() ? Auth::user()->id : ""}}'>
                    </i>
                    <span class="heart-create-at">&nbsp&nbsp{{date('Y-m-d', strtotime($column->created_at))}}</span>

                </div>
                <hr class="shape-8"/>
            </div>

            <div class="txt col-md-12 col-sm-12 col-xs-12">
                <div class="txt_content">
                    {!! $column->content !!}
                </div>
            </div>
        </div>
        <div class="row justify-content-center txt-btn">
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary btn-lg btn-block show-modal-register-mypage"
                        data-id="{{$column->id}}"
                        data-user='{{Auth::user() ? Auth::user()->id : ""}}'>マイテーマを見つける
                </button>
            </div>
        </div>
    </div>
@endsection

@section('javascript-add')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click','.show-modal-register-mypage',function(e){
                e.preventDefault();
                var user_id = $(this).data('user');
                var column_id = $(this).data('id');
                var _this = $(this);

                if(user_id) {
                   window.location.href = "{{ url('my-page') }}";
                }
                else{
                    $html = '';
                    $html +='<div class="form-group code-top">';
                    $html +='<div class="col-md-5">';
                    $html +='<p class="title-register">動画やイベント、あなたの興味のあるものを貯めて、マイテーマを作っていこう！</p>';
                    $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                    $html +='</div>';
                    $html +='<img src="{{ asset("images/picture1.png") }}">';
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
            })

            $(document).on('click','.icon-favorite .fa-heart-o', function(e) {
                e.stopPropagation();
                var user_id = $(this).data('user');
                var column_id = $(this).data('id');
                var _this = $(this);
                if(user_id) {
                    $.ajax({
                        url : '{{route("column.favorite")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            column_id : column_id,
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