@extends('layouts.app')
@section('og-image')
    @php $image='images/admin/column/'.$column->image; @endphp
    <meta property="og:image" content="{{ file_exists($image) ? asset($image): asset('images/default/column_default.jpg') }}"" />
@endsection

@section('css-add')
    @parent
@endsection
@section('page_title', $column->title)
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のコラムページです。「私が、探求したいこと」であるマイテーマをみつけるノウハウ・イベントレポート・アラハタ世代の活躍を発信していきます。')
@section('title-e', 'Column')
@section('title-j', 'コラム')
@section('body-class', 'column-page')
@section('content')
    <div class="container column">
        <div class="row">
            <div class="tit col-md-12 col-sm-12 col-xs-12">
                <div class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <br>
                <p class="title">{{$column->title}}</p>
                <div class="icon-favorite">
                    <i class="fa heart-icon {{$column->columnliked == 1 ? 'fa-heart' : 'fa-heart-o'}}" style="font-size:24px;"
                                           data-id="{{$column->id}}"
                                           data-user='{{Auth::user() ? Auth::user()->id : ""}}'
                                           data-table="columns">
                                        </i>
                    <span class="heart-create-at">&nbsp&nbsp{{date('Y-m-d', strtotime($column->created_at))}}</span>

                </div>
                <hr class="shape-8"/>
            </div>

            <div class="txt col-md-12 col-sm-12 col-xs-12">
                <div class="ckeditor-body">
                    {!! $column->content !!}
                </div>
            </div>
        </div>
        <div class="row justify-content-center txt-btn">
            <div class="col-sm-6">
                <button type="button" class="round-button black lg show-modal-register-mypage"
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
                    $html +='<div class="col-md-5" style="display: none;">';
                    $html +='<p class="title-register"></p>';
                    $html +='<input type="hidden" name="type" id="type_regiter" value="1">';
                    $html +='</div>';
                    $html +='<img src="{{ asset("images/register_mypage.png") }}">';
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
            })

            $(document).on('click','.icon-favorite .fa-heart-o,.icon-favorite .fa-heart', function(e) {
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
                                _this.addClass('fa-heart');
                                _this.removeClass('fa-heart-o');
                            }else {
                                _this.removeClass('fa-heart');
                                _this.addClass('fa-heart-o');
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