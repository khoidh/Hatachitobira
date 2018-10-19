@extends('layouts.app')
@section('title-e', 'My Theme')
@section('title-black', '動画から将来の選択肢を知って')
@section('title-blackspan', 'の種をみつけよう')
@section('title-j')
マイテーマ
@endsection
@section('content')
    <div class="container video">
        <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-6">
                <div class="topnav">
                    <div class="search-container">
                        <input type="text" placeholder="" name="search">
                        <button id="searchvideo"><i class="fa fa-search" ></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row video-list">
            @foreach($results as $result)
                @if(isset($result->items[0]))
                <div class="col-lg-4 col-sm-4 col-md-4 video-detail">
                    <div class="wrapper">
                        <div class="thump">
                            <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->items[0]->player->embedHtml}}'>
                                <img src="{{ asset('image/video/btn-play.png')}}" alt="" >
                                <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                            </div>
                            <a href="#">
                                <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                            </a>
                        </div>
                        <div class="description">
                            <p>
                                <?php 
                                    $title = $result->items[0]->snippet->title;
                                    substr($title, 0,20);
                                    echo $title. '...';
                                ?>
                            </p>
                            <span>{{$result->items[0]->statistics->viewCount}} Views /</span>
                            <span>7 month ago /</span>
                            <span>{{$result->category}}</span>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 paging text-center clearfix">
                <ul class="pagination" role="navigation">
                    @include('includes.pagination', ['paginator' => $results])
                </ul>
            </div>
        </div>
        
    </div>
    <div id="modal_video" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog" style="margin-top:150px">
            <div class="modal-content" style="width: 515px;border-radius: 13px;">
                <div class="modal-body" style="text-align:center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <script type="text/javascript"  async defer>
        $(document).ready(function() {
            $(document).on('click','.video .video-list .browse-details', function(e){
                e.preventDefault();
                var idvideo = $(this).data('id');
                var src = $(this).data('src');
                $('#modal_video .panel-body').html(src);
                $('#modal_video').modal('show');
            });

            $(document).on('change','#category_id',function(e){
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url : '{{url("video-search-category?category=")}}'+ id
                }).done(function(data){
                    $('.row.video-list').html(data);
                });
            })

            $(document).on('click','#searchvideo',function(e){
                e.preventDefault();
                var text = $(this).val();
                var id = $('#category_id').val();
                console.log(text);
                console.log(id);
                $.ajax({
                    url : '{{url("video-search-text?category_id=")}}'+ id +'&page=1&description='+text
                }).done(function(data){
                    $('.row.video-list').html(data);
                });
            });

            $(document).on('click','.pagination .page-link',function(e){
                e.preventDefault();
                var text = $('.search-container input').val();
                var id = $('#category_id').val();
                var page = $(this).attr('href').split('page=')[1];
                console.log(text);
                console.log(id);
                $.ajax({
                    url : '{{url("video-search-text?category_id=")}}'+ id +'&page='+page+'&description='+text
                }).done(function(data){
                    $('.row.video-list').html(data);
                });
            });

            $(document).on('click','.browse-details .favorite',function(e){
                e.stopPropagation();
                var idvideo = $(this).data('id');
                var user = $(this).data('user');
                var _this = $(this);
                if (user == '') {
                    $html = '';
                    $html +='<div class="form-group code-top">';
                        $html +='<div class="col-md-5">';
                        $html +='<p class="title-register">イベント参加・個人ページの利用は会員限定です。さあ、マイテーマを探そ。</p>';
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