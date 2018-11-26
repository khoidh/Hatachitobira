@extends('layouts.app')
@section('page_title', '動画から探す')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」の動画検索ページです。仕事現場の働く1日に学生が密着した動画や、ロールモデルの人生ストーリーから、マイテーマの種をみつけよう。')
@section('title-e', 'My theme')
@section('title-black', '動画から将来の選択肢を知って、')
@section('title-blackspan', 'の種をみつけよう')
@section('title-j','マイテーマ')
@section('main')
    <div class="container-fluid video">
        <div class="main row">
            <div class="title-lx">
                <div class="container">
                    <div class="relative row">
                        <div class="info col-md-12">
                            <div class="title-e">@yield('title-e','Title')</div>
                            <div class="absolute">
                                <p style="margin-bottom: 0"><b>@yield('title-black')</b></p>
                                <p style="margin-bottom: 0"><span
                                            class="title-j"> @yield('title-j','タートル')</span><b>@yield('title-blackspan')</b>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container video">
        <div class="category row">
            <div class="col-md-6 col-12 category-input select-wrapper">
                <select name="video_type" id="video_type" class="">
                    <option value="">動画のタイプ</option>
                    @foreach($video_types as $type)
                    <option
                        value="{{$type->id}}"
                        {{ ($selected_video_type_id == $type->id) ? 'selected' : ''}}
                        >{{$type->name}}</option>
                    @endforeach
                    <option value="">全て</option>
                </select>
            </div>
            <div class="col-md-6 col-12 search-container input-wrapper">
                <input type="text" placeholder="" name="search">
                <button id="searchvideo"><i class="fa fa-search" ></i></button>
            </div>
        </div>
        <div id="list-top" class="row video-list list-video-tall">
            @forelse($videos as $result)
                <?php 
                    $title = $result->title;
                    substr($title, 0,10);
                ?>
                <div class="col-lg-4 col-sm-4 col-md-4 video-detail">
                    <div class="wrapper">
                        <div class="thump">
                            <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->embedHtml}}' data-url = "{{$result->url}}">
                                <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                            </div>
                            <a href="#">
                                <img class="img-icon" src="{{  $result->thumbnails}}" alt="">
                            </a>
                            {{-- <p class="video-title sub-title">{{ $title }} {{strlen($result->title) >10 ? '...' : ''}}</p> --}}
                        </div>
                        <div class="description">
                            <p>{{ $title }}</p>
                            <span>{{$result->viewCount}} Views /{{ $result->date_diff }} month ago /{{$result->category_name}}</span>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="data-not-found">登録データがありません。</h4>
            @endforelse
            <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                <ul class="pagination pagination-lg" role="navigation">
                    @include('includes.pagination', ['paginator' => $videos])
                </ul>
            </div>
        </div>
        
    </div>
    <div id="modal_video" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog" style="margin-top:50px">
            <div class="modal-content" style="border-radius: 13px;">
                <div class="modal-body" style="text-align:center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="panel-body">
                    </div>
                    <div class="share">
                        <span class="article">シェアする</span>
                        <span><a class="twitter social-share" href="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                        <span><a class="facebook social-share" href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <script type="text/javascript"  async defer>
        $(document).ready(function() {
            $("#modal_video").on('hide.bs.modal', function(){
                $("iframe").attr('src', '');
            });
            
            $(document).on('click','.video .video-list .browse-details', function(e){
                e.preventDefault();
                var idvideo = $(this).data('id');
                var src = $(this).data('src');
                var url = $(this).data('url');
                $('#modal_video .twitter').attr('href','https://twitter.com/intent/tweet?url='+url);
                $('#modal_video .facebook').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
                $('#modal_video .panel-body').html(src);
                $('#modal_video').modal('show');
            });

            var popupMeta = {
                width: 400,
                height: 400
            };
            $(document).on('click', '.social-share', function(event){
                event.preventDefault();

                var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
                    hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

                var url = $(this).attr('href');
                var popup = window.open(url, 'Social Share',
                    'width='+popupMeta.width+',height='+popupMeta.height+
                    ',left='+vPosition+',top='+hPosition+
                    ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

                if (popup) {
                    popup.focus();
                    return false;
                }
            });

            $(document).on('change','#video_type',function(e){

                e.preventDefault();
                scroll_to("list-top");
                var text = $('.search-container input').val();
                var id = $(this).val();
                $.ajax({
                    url : '{{url("video-search-text?video_type=")}}'+ id +'&page=1&description='+text,

                    success: function (data) {
                        set_video_list(data);
                    }
                });
            });

            $(document).on('keypress','.search-container input',function(e){
                if(e.which == 13) {
                    scroll_to("list-top");
                    var text = $('.search-container input').val();
                    var id = $('#video_type').val();
                    $.ajax({
                        url : '{{url("video-search-text?video_type=")}}'+ id +'&page=1&description='+text,
                        success: function (data) {
                            set_video_list(data);
                        }
                    });
                }
            });

            $(document).on('click','#searchvideo',function(e){
                e.preventDefault();
                scroll_to("list-top");
                var text = $('.search-container input').val();
                var id = $('#video_type').val();
                $.ajax({
                    url : '{{url("video-search-text?video_type=")}}'+ id +'&page=1&description='+text,
                    success: function (data) {
                        set_video_list(data);
                    }
                
                });
            });

            $(document).on('click','.pagination .page-link',function(e){
                e.preventDefault();
                scroll_to("list-top");
                var text = $('.search-container input').val();
                var id = $('#video_type').val();
                var page = $(this).attr('href').split('page=')[1];
                $.ajax({
                    url : '{{url("video-search-text?video_type=")}}'+ id +'&page='+page+'&description='+text,
                    success: function (data) {
                        set_video_list(data);
                    }
                });
            });

            var set_video_list = function(data) {
                $('.row.video-list').html(data);
            }

            $(document).on('click','.browse-details .favorite',function(e){
                e.stopPropagation();
                var idvideo = $(this).data('id');
                var user = $(this).data('user');
                var _this = $(this);
                if (user == '') {
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
                }else {
                    $.ajax({
                        url : '{{route("video.favorite")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            video_id : idvideo,
                            user_id: user
                        },
                        success : function (result){
                            console.log(result);
                            if (result == 'ok') {
                                _this.find('.fa.fa-heart-o').addClass('liked');
                                _this.find('.fa.fa-heart-o').css('color','pink');
                            }else {
                                _this.find('.fa.fa-heart-o').removeClass('liked');
                                _this.find('.fa.fa-heart-o').css('color','#fff');
                            }
                        }
                    })
                }
            })
        });


    </script>
@endsection