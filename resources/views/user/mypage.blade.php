@extends('layouts.app')

@section('css-add')
    @parent
@endsection
@section('title-e', 'MY PAGE')
@section('title-j', 'マイページ')
@section('content')
    <div class="container my-page">
        <div class="row">
            <div class="col-sm-12 how-to-use">
                <a class="a-user" href="#">
                    <i class="fa fa-question-circle-o"></i>
                    <span class="a-user-text" >&nbsp;このパーツの使い方はこちら</span>
                </a>
            </div>

            <div class="col-sm-12 select-month">
                <h1>
                    <i class="fa fa-chevron-circle-left icon-back" aria-hidden="true"> </i>
                    <b>&nbsp;{{$data_date['year']}}年{{$data_date['month']}}月&nbsp;</b>
                    <i class="fa fa-chevron-circle-right icon-next" aria-hidden="true"> </i>
                </h1>
            </div>

            <div class="col-sm-12 info-1">
                <div class="row memo">
                    <div class="col-sm-2 memo-text">
                        <div class="underline">&nbsp;MEMO&nbsp;</div>
                    </div>
                    <div class="col-sm-10 memo-input">
                        <input type="text" name="" class="input-memo" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}"  placeholder="先月の行動を振り返り記録しよう" value="{{$mytheme_first->memo}}">
                    </div>
                </div>

                <hr class="shape-8"/>

                <div class="row log">
                    <div class="col-sm-2 log-text">
                        <div class="underline">&nbsp;先月のログ&nbsp;</div>
                    </div>
                    <div class="col-sm-10 log-input">
                        <input type="text" name="" class="input-lat-log" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="先月の自分を#で記録しよう　#バイト三昧　#初ボランティア" value="{{$mytheme_first->last_log}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xs-12 panel-info">
                <div class="row">
                    
                    @php ($index=1)
                    @for ($i = 0; $i < 9; $i++)
                        @if($i!=4)
                        <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                                <div class="panel-info-content">
                                    <div class="number">
                                        <span>0{{$index++}}</span>
                                    </div>
                                    <div class="mypage-text">
                                        <?php $key = $i>4 ? $i : $i+1 ?>
                                        <span>
                                            <textarea name="value-lable" class="edit-input-lable" 
                                                data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                                data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                                data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                                data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                                placeholder="Click here to edit">{{isset($mythemes[$i]->content_lable) ? $mythemes[$i]->content_lable : ''}}</textarea>
                                        </span>
                                    </div>
                                    <div class="favorite edit">
                                        <i class="fa fa-pencil"
                                            data-month="{{isset($mythemes[$i]->month) ? $mythemes[$i]->month : $data_date['month']}}" 
                                            data-year="{{isset($mythemes[$i]->year) ? $mythemes[$i]->year : $data_date['year']}}" 
                                            data-category = "{{isset($mythemes[$i]->category_id) ? $mythemes[$i]->category_id : $key}}" 
                                            data-id = "{{isset($mythemes[$i]->id) ? $mythemes[$i]->id : ''}}"
                                        >
                                            Edit</i>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{--05--}}
                            <div class="col-sm-4 col-xs-4 panel-info-wrapper">
                                <div class="event-image" style="background-image: url('{{asset('image/mypage/mypage-01.png')}}'); ">
                                </div>
                            </div>
                            {{--@php ($i--);--}}
                        @endif
                    @endfor
                    
                </div>
            </div>

            <div class="col-sm-12 info-2">
                <div class="row my-theme">
                    <div class="col-sm-3 my-theme-text">
                        <div class="underline">&nbsp;今月のマイテーマ&nbsp;</div>
                    </div>
                    <div class="col-sm-9 my-theme-input">
                        <input type="text" name="my-therme-month" class="input-my-theme" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="例:「人に喜んでもらう接客とは？」「自分の理想のチームをつくるには？」" value="{{$mytheme_first->this_mytheme}}">
                    </div>
                </div>

                <hr class="shape-8"/>

                <div class="row action">
                    <div class="col-sm-3 action-text">
                        <div class="underline">&nbsp;今月のアクション &nbsp;</div>
                    </div>
                    <div class="col-sm-9 action-input">
                        <input type="text" name="action-of-month" class="input-action" data-month="{{isset($mytheme_first->month) ? $mytheme_first->month : $data_date['month']}}" 
                                            data-year="{{isset($mytheme_first->year) ? $mytheme_first->year : $data_date['year']}}" placeholder="考えたいこと、行動したいことを3つ決めよう" value="{{$mytheme_first->this_action}}">
                    </div>
                </div>
                <hr class="shape-8"/>
            </div>

        </div>
    </div>

    <div class="container-fluid my-page">
        <div class="main ">
            <div class="container group-1">
                <div class="category row">
                    <strong class="col-sm-10 category-input">
                        <select name="category_id" class="cb-category" required="true" autofocus>
                            <option selected disabled>あなたのカテゴリ</option>
                            {{--@foreach($categories as $category)--}}
                                {{--<option value="{{$category->id}}">{{$category->name}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </strong>
                    <span class="col-sm-2 category-text"><b>の新着</b></span>
                </div>

                <div class="content-text">
                    <div class="col-sm-12 item">
                        <div class="row wrapper">
                            <div class="wrapper-status">
                                <img
                                        src="{{asset('image/mypage/mypage-icon.png')}}" alt="column-icon.png"
                                        {{--@if($column->type == 0)--}}
                                        {{--src="{{asset('image/column/column-icon.png')}}" alt="column-icon.png"--}}
                                        {{--@else--}}
                                        {{--src="{{asset('image/column/column-visible-icon.png')}}" alt="column-visible-icon.png"--}}
                                        {{--@endif--}}
                                >
{{--                                <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>--}}
                                {{--<span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>--}}
                                <span>インタビュー</span>
                            </div>

                            <div class="col-sm-4 wrapper-icon">
                                <img src="{{asset("image/top/img-event-1.png")}}" alt="img-event-1.png">
                            </div>
                            <div class="col-sm-8 wrapper-content">
                                <p class="clearfix icon-favorior"><a href="#"><i class="fa fa-heart-o" style="font-size: 24px;"></i></a></p>
                                <span class="text-title"><b>タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</b></span>
                                <span class="text-category">#カテゴリ</span>
                                <p class="text-date">2018.3.20</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="btn-category-list col-sm-12">--}}
                    {{--<div class="col-sm-6 col-sm-offset-3">--}}
                        {{--<button type="submit" class="btn btn-primary btn-lg btn-block">一覧を見る</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="row justify-content-center form-group btn-category-list">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">一覧を見る</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container my-page">
        <div class="group-2">
            <div class="item video1">
                <span class="underline video-title">お気に入り動画(3)</span>
                <span class="button-next-back" style="text-align: right">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <i class="fa fa-arrow-circle-o-right"></i>
                </span>

                <div class="row video-content">
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <p class="attached">892view/7month/#カテゴリ</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <p class="attached">892view/7month/#カテゴリ</p>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{asset('image/mypage/mypage-02.png')}}" alt="video-01.png">
                        <p class="title">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</p>
                        <span class="attached">892view/7month/#カテゴリ</span>
                    </div>
                </div>
            </div>

            <div class="item event">
                <div class="underline event-title">参加したイベント(0)</div>
                <div class="event-content">
                    <p>社会人から話を聞いて、マイテーマ探しをしてみよう</p>
                    <span class="more-detail"><b>イベントを探す</b></span>
                    <img src="{{asset('image/top/arrow-1.png')}}">
                </div>
            </div>

            <div class="item column">
                <div class="underline column-title">お気に入り記事({{count($columns)}})</div>
                <span class="button-next-back" style="text-align: right">
                    <i class="fa fa-arrow-circle-o-left"></i>
                    <i class="fa fa-arrow-circle-o-right"></i>
                </span>
                <div class="article">
                    <?php
                        $column= $columns[0]; //temp

                        $column_state="インタビュー";
                        if($column->type == 1)
                            $column_state = "コラム";
                        else
                            $column_state = "インタビュー";
                    ?>
                    <div class="article-status">
                        <hr class="shape-8"/>
                        <img
                                @if($column->type == 0)
                                src="{{asset('image/mypage/mypage-icon.png')}}" alt="column-icon.png"
                                @else
                                src="{{asset('image/mypage/mypage-visible-icon.png')}}" alt="column-visible-icon.png"
                                @endif
                        >
                        <span style="@if($column->type ==1) left: 25px; @endif">{{$column_state}}</span>
                    </div>

                    <div class="article-content row">
                        <div class="content-left col-md-4">
                            <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                <?php $image='image/column/'.$column->image; ?>
                                <img class="image" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}" alt="{{$image}}">
                            </a>
                        </div>
                        <div class="content-right col-md-8">
                            <div class="icon-favorite">
                                {{--==================== favorite ====================--}}
                                <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                                
                                {{--==================== /end favorite ====================--}}
                            </div>
                            <span class="title">{{$column->title}}</span>
                            <span class="category">&nbsp;&nbsp;{{$column->category_name}}</span>
                            <div class="date" >
                                <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
<div id="show-detail-mypage" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" id="dissmiss_modal_show">&times;</button>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++){
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }

        tech = GetURLParameter('redirect-link');
        if (tech == 'true') {
            $html = '<div class ="form-register-last">'
            $html += '<div class="form-group">';
            $html +='<h3>会員登録が完了しました!</h3>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">マイテーマを探すために、</label>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">気になる動画の収集や、個人の活動の記録を</label>';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html +='<label for="name" class="control-label">管理していきましょう。</label>';
            $html +=' </div>';
            $html += '<div class="form-group" style="margin-bottom: 28px; margin-top: 30px;">';
            $html +='<img class="image-register" src="{{ asset("image/register_1.png") }}">';
            $html +=' </div>';
            $html += '<div class="form-group">';
            $html += '<div class="col-md-12">'
            $html +='<a  class="btn btn-warning" href="{{route("mypage.index")}}">MY PAGEへ</a>';
            $html +=' </div>';
            $html +=' </div>';
            $html +=' </div>';
            $('#modal_register').find('.panel-body').addClass('form-horizontal');
            $('#modal_register').find('.panel-body').html($html);
            $('#modal_register').modal('show');
        }

        $(document).on('focusout','.edit-input-lable',function(e){
            var year = $(this).data('year');
            var month = $(this).data('month');
            var category = $(this).data('category');
            var id = $(this).data('id');
            var text = $(this).val();
            var _this = $(this);
            $.ajax({
                url : '{{route("mypage.change-lable")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    year : year,
                    month : month,
                    category_id : category,
                    id : id,
                    content_lable: text
                },
                success : function (result){
                    _this.attr('data-category',result.category_id);
                    _this.attr('data-id',result.id);
                    _this.parents('.panel-info-content').find('.favorite.edit').find('.fa-pencil').attr('data-category',result.category_id);
                    _this.parents('.panel-info-content').find('.favorite.edit').find('.fa-pencil').attr('data-id',result.id);
                }   
            })
        })

        $(document).on('focusout','.input-memo,.input-lat-log,.input-my-theme,.input-action',function(e){
            var _this = $(this);
            var year = _this.data('year');
            var month = _this.data('month');
            var text_memo = $('.input-memo').val();
            var text_last_log = $('.input-lat-log').val();
            var text_my_theme = $('.input-my-theme').val();
            var text_action= $('.input-action').val();
            $.ajax({
                url : '{{route("mypage.change-content")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    year : year,
                    month : month,
                    memo : text_memo,
                    last_log : text_last_log,
                    this_mytheme: text_my_theme,
                    this_action: text_action
                }  
            })
        })
        $(document).on('focusout','.edit-input-content',function(e){
            var year = $(this).data('year');
            var month = $(this).data('month');
            var category = $(this).data('category');
            var content = $(this).data('content');
            var id = $(this).data('id');
            var text = $(this).val();
            var _this = $(this);
            $.ajax({
                url : '{{route("mypage.change-content-child")}}',
                type: 'post',
                dataType: 'json',
                data: {
                    year : year,
                    month : month,
                    category_id : category,
                    id : id,
                    content_data: text,
                    content: content
                },
                success : function (result){
                    _this.parents('.detail-infor').find('.edit-input-content').attr('data-id',result.id);
                }   
            })
        })

        $(document).on('click','.favorite.edit .fa-pencil',function(e){
            e.preventDefault();
            var _this = $(this);
            var year = _this.data('year');
            var month = _this.data('month');
            var id = _this.data('id');
            var category = $(this).data('category');
            $.ajax({
                url : '{{route("mypage.show-modal")}}',
                type: 'post',
                dataType: 'html',
                data: {
                    year : year,
                    month : month,
                    category_id : category,
                    id : id
                },
                success : function (result){
                    $('#show-detail-mypage').find('.panel-body').html(result);
                    $('#show-detail-mypage').modal('show');
                    _this.parents('.panel-info-content').find('.edit-input-lable').addClass('editing');
                }   
            })
        })

        $(document).on('click','#dissmiss_modal_show',function(e){
            e.preventDefault();
            var text = $('#show-detail-mypage').find('.edit-input-lable').val();
            $('.edit-input-lable.editing').val(text);
            $('.edit-input-lable.editing').removeClass('editing');
            $('#show-detail-mypage').modal('hide');
        })

    });
</script>
@endsection