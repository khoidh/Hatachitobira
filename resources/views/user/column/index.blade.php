@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('page_title', 'コラム')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のコラムページです。「私が、探求したいこと」であるマイテーマをみつけるノウハウ・イベントレポート・アラハタ世代の活躍を発信していきます。')
@section('title-e', 'Column')
@section('title-j', 'コラム')
@section('body-class', 'column-page')
@section('content')
    <div class="container column">
        <div class="row">
            <div class="article-list col-md-12">
                @foreach($columns as $column)
                    <div class="article">
                        @php
                            $column_state="";
                            if($column->type == 1)
                                $column_state = "コラム";
                            else
                                $column_state = "インタビュー";
                        @endphp
                        <div class="article-status">
                            <hr class="shape-8"/>
                            <img
                                @if($column->type == 0)
                                    src="{{asset('images/user/column/column-icon.png')}}" alt="column-icon.png"
                                @else
                                    src="{{asset('images/user/column/column-visible-icon.png')}}" alt="column-visible-icon.png"
                                @endif
                            >
                            <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>
                        </div>

                        <div class="article-content row">
                            <div class="content-left col-md-4">
                                <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                    @php $image='images/admin/column/'.$column->image; @endphp
                                    <img class="image" src="{{file_exists($image)?asset($image): asset('images/default/column_default.jpg')}}" alt="{{$image}}">
                                </a>
                            </div>
                            <div class="content-right col-md-8">
                                <div class="icon-favorite">
                                    {{--==================== favorite ====================--}}
                                    <i class="fa {{$column->columnliked == 1 ? 'fa-heart' : 'fa-heart-o'}}" style="font-size:24px;"
                                           data-id="{{$column->id}}"
                                           data-user='{{Auth::user() ? Auth::user()->id : ""}}'
                                           data-table="columns">
                                        </i>
                                    {{--==================== /end favorite ====================--}}
                                </div>
                                <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                    <span class="title">{{$column->title}}</span>
                                    <span class="category">&nbsp;&nbsp;{{$column->multicategoty}}</span>
                                </a>
                                <div class="date" >
                                    <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr class="shape-8"/>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                    <ul class="pagination pagination-lg" role="navigation">
                        @include('includes.pagination', ['paginator' => $columns])
                    </ul>
                </div>
            </div>
        </div>

        {{--<div class="pagination" role="navigation">--}}
            {{--{{ $columns->links('vendor.pagination.custom') }}--}}
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
                else
                {
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