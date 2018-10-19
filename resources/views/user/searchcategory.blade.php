@extends('layouts.app')

@section('title-e', 'Category Search')
@section('title-j', 'カテゴリー検索')

@section('content')
<?php 
    $search = isset($_GET['search']) && $_GET['search'] != '' ? $_GET['search'] : 0;
 ?>
<div class="row-category">
    <div class="select-search">
        <select class="select-box search" name="select-category">
            <option value="0">Category</option>
            @foreach($categories as $categorie )
            <option value="{{$categorie->id}}" {{$categorie->id== $search ? 'selected' : '' }}>{{$categorie->name}}</option>
            @endforeach
        </select>
    </div>
</div>  

<div class="container">
    <div class="row searchcategory">
            <div class="row column-search event">
                <h3 class="title-event">コラム</h3>
                <div class="article-list col-md-12">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner row mx-auto" role="listbox">
                            @forelse($columns as $key => $column)
                            <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                                @php
                                    $time_now = Carbon\Carbon::now();
                                    $time_from = Carbon\Carbon::parse($column->time_from);
                                    $time_to = Carbon\Carbon::parse($column->time_to);
                                    $check=$time_now->between($time_from,$time_to);
                                    if($check)
                                    $column_state="申し込み受付中";
                                    else
                                    $column_state="受付終了";
                                @endphp
                                <div class="text-category">
                                    {{$column_state}}
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('event.show', $column->id)}}" style="text-decoration:none;">
                                            
                                            @php $image='image/event/'.$column->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $column->favorite == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title">{{$column->title}}</div>
                                        <div class="category" style="color: #636B6F; font-weight: bold">
                                            <p>{{$column->category_name}}</p>
                                        </div>
                                        <div class="date" style="text-align: right">
                                            <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h4 class="data-not-found">Data not found</h4>
                            @endforelse
                        </div>
                        @if(count($columns) > 1)
                         <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row event-search event">
                <h3 class="title-event">イベント</h3>
                  
                <div class="article-list col-md-12">
                    <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner row mx-auto" role="listbox">
                            @forelse($events as $key => $event)
                            <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                                @php
                                    $time_now = Carbon\Carbon::now();
                                    $time_from = Carbon\Carbon::parse($event->time_from);
                                    $time_to = Carbon\Carbon::parse($event->time_to);
                                    $check=$time_now->between($time_from,$time_to);
                                    if($check)
                                    $column_state="申し込み受付中";
                                    else
                                    $column_state="受付終了";
                                @endphp
                                <div class="text-category last">
                                    <p>{{$column_state}}</p>
                                </div>
                                <div class="article-content row">
                                    <div class="content-left col-md-4">
                                        <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                            @php $image='image/event/'.$event->image; @endphp
                                            <img src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="content-right col-md-8">
                                        <div class="icon-favorite">
                                            <i class="fa fa-heart-o {{ $event->favorite == 1 ? 'liked' : ''}}"  data-id='{{$event->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                        </div>
                                        <div class="title">{{$event->title}} <p>{{$event->category_name}}</p></div>
                                        <div class="category" style="color: #636B6F; font-weight: bold">
                                            <p>{{$event->category_name}}</p>
                                        </div>
                                        <div class="date" style="text-align: right">
                                            <p>{{date('Y-m-d', strtotime($event->created_at))}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h4 class="data-not-found">Data not found</h4>
                            @endforelse
                        </div>
                        @if(count($events) > 1)
                        <a class="carousel-control-prev" href="#carouselExampleevent" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExampleevent" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row video-search video">
                <h3 class="title-event">動画</h3>
                 <div class="row video-list col-md-12">
                    <div id="carouselExampleevent123" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                        <div class="carousel-inner row mx-auto" role="listbox">
                            @forelse($results as $key => $result)
                                @if(isset($result->items[0]))
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 video-detail {{count($results) > 2 ? 'carousel-item' : ''}}  {{ $key == 0 || $key == 1 ||$key == 2  ? 'active' : ''}}">
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
                            @empty
                            <h4 class="data-not-found">No data found</h4>
                            @endforelse
                        </div>
                        @if(count($results) > 2)
                        <a class="carousel-control-prev" href="#carouselExampleevent123" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#carouselExampleevent123" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        @endif
                    </div>
                 </div>
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

<script type="text/javascript" async defer>
    $(document).ready(function(){

        if (window.innerWidth < 427) {
            $('.video-detail.carousel-item').not(':first').removeClass('active');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(document).on('click','.video .video-list .browse-details', function(e){
            e.preventDefault();
            var idvideo = $(this).data('id');
            var src = $(this).data('src');
            $('#modal_video .panel-body').html(src);
            $('#modal_video').modal('show');
        });

        $(document).on('change','.select-box.search',function(e){
            console.log('aaaaa');
            url = "{{URL::to('search-category') }}?search=" + $(this).val();
            window.location.href=url;
        })

        $(document).on('click','.page-link',function(e){
            e.preventDefault();
            var category = $('.select-box.search').val();
            var page = $(this).attr('href').split('page=')[1];
            if ($(this).parent().parent().parent().parent().parent().hasClass("column-search")) {
                $.ajax({
                    url : '{{url("paginate-column?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.column-search').find('.article-list.col-md-12').html(data);
                });
            }else if($(this).parent().parent().parent().parent().parent().hasClass("event-search")) {
                console.log('aa')
                $.ajax({
                    url : '{{url("paginate-event?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.event-search').find('.article-list.col-md-12').html(data);
                });
            }
            else if($(this).parent().parent().parent().parent().hasClass("video-search")) {
                $.ajax({
                    url : '{{url("paginate-video?category=")}}'+category + '&page='+page
                }).done(function(data){
                    $('.video-search').find('.row.video-list').html(data);
                });
            }
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
                        _this.find('.fa.fa-heart-o').addClass('like');
                        _this.find('.fa.fa-heart-o').css('color','pink');
                    }   
               })
            }

        })

        $(document).on('click','.row.event-search .fa.fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
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
                    url : '{{route("event.favorite")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        video_id : idevent,
                        user_id: user
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

        })


        $(document).on('click','.row.column-search .fa.fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
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
                    url : '{{route("column.favorite")}}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        column_id : idevent,
                        user_id: user
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

        })
    })
</script>
@endsection
