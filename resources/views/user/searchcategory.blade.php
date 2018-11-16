@extends('layouts.app')
@section('css-add')
    @parent
    <link href="{{ asset('assets/slick/slick.css') }}" rel="stylesheet">
@endsection
@section('page_title', 'カテゴリーから探す')
@section('description', '学校と社会をつなぐ「ハタチのトビラ」のカテゴリー検索ページです。自分の興味から、マイテーマの種をみつけよう。')
@section('title-e', 'Category Search')
@section('title-j', 'カテゴリー検索')
@section('content')


<div class="container searchcategory">
    <div class="row fix-mb">
        @foreach($categories as $categorie)
        <div class="image-category">
            <img class="img-cat-detail {{$categorie->slug == $slug ? 'selected' : ''}}" data-id="{{$categorie->id}}" src="{{ asset('images/admin/category/'.$categorie->icon) }}" alt="{{$categorie->name}}">
        </div>
        @endforeach
    </div>

</div>
<div class="container content-search">
    <div class="searchcategory">
        <div class="row column-search event mb-30">
            <h3 class="underline-text">コラム</h3>
            <div class="article-list col-md-12">
                <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                    <div class="carousel-inner row mx-auto" role="listbox">
                        @forelse($columns as $key => $column)
                        <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                            @include('includes/column_state', compact('column'))
                            <div class="article-content row">
                                <div class="content-left col-md-4">
                                    <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/column/'.$column->image; @endphp
                                        <img src="{{file_exists($image)?asset($image): asset('images/user/column/column_default.jpg')}}" alt="{{$column->title}}">
                                    </a>
                                </div>
                                <div class="content-right col-md-8">
                                    <div class="icon-favorite">
                                        <i class="fa fa-heart-o {{ $column->favorite == 1 ? 'liked' : ''}}" data-id='{{$column->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                    </div>
                                    <div class="title"><a href="{{route('column.show', $column->id)}}">{{$column->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$column->category_name}}</span></div>
                                    <div class="category" style="color: #636B6F;">
                                        <p>{{$column->category_name}}</p>
                                    </div>
                                    <div class="date" style="text-align: right">
                                        <p>{{date('Y.m.d', strtotime($column->created_at))}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4 class="data-not-found">登録データがありません。</h4>
                        @endforelse
                    </div>
                    @if(count($columns) > 1)
                     <a class="carousel-control-prev" style="display: none;" href="#carouselExample" role="button" data-slide="prev">
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
        <div class="row event-search event mb-30">
            <h3 class="underline-text">イベント</h3>
            <div class="article-list col-md-12">
                <div id="carouselExampleevent" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
                    <div class="carousel-inner" role="listbox">
                        @forelse($events as $key => $event)
                        <div class="article carousel-item {{ $key == 0 ? 'active' : ''}}">
                            @include('includes/event_state', compact('event'))
                            <div class="article-content row">
                                <div class="content-left col-md-4">
                                    <a href="{{route('event.show', $event->id)}}" style="text-decoration:none;">
                                        @php $image='images/admin/event/'.$event->image; @endphp
                                        <img src="{{file_exists($image)?asset($image): asset('images/user/event/event_default.jpg')}}" alt="{{$event->title}}">
                                    </a>
                                </div>
                                <div class="content-right col-md-8">
                                    <div class="icon-favorite">
                                        <i class="fa fa-heart-o {{ $event->favorite == 1 ? 'liked' : ''}}"  data-id='{{$event->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' style="font-size:24px;"></i>
                                    </div>
                                    <div class="title"><a href="{{route('event.show', $event->id)}}">{{$event->title}}</a> &nbsp;&nbsp; <span style="color: #636B6F;">{{$event->category_name}}</span></div>
                                    <div class="category" style="color: #636B6F;">
                                        <p>{{$event->category_name}}</p>
                                    </div>
                                    <div class="date" >
                                        <p>{{date('Y.m.d', strtotime($event->started_at))}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h4 class="data-not-found">登録データがありません。</h4>
                        @endforelse
                    </div>
                    @if(count($events) > 1)

                    <a class="carousel-control-prev" style="display: none;" href="#carouselExampleevent" role="button" data-slide="prev">
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
    </div>
    <div class="group-2">
        <div class="item video1">
            <h3 class="underline-text video-title">動画</h3>
            <div class="row video-content video">
                <div class="row video-list col-md-12">
                    <div class="carousel-inner carosel-video-list row mx-auto">
                        @forelse($videos as $key => $result)
                            <div class=" item col-xs-12 col-sm-12 col-md-12 col-lg-12 video-detail carousel-item {{ $key == 0  ? 'active' : ''}}">
                                <div class="wrapper">
                                    <div class="thump">
                                        <div class="browse-details" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}' data-src='{{$result->embedHtml}}' data-url="{{$result->url}}">
                                            <img src="{{ asset('images/user/video/btn-play.png')}}" alt="" >
                                            <div class="favorite" data-id='{{$result->id}}' data-user='{{Auth::user() ? Auth::user()->id : "" }}'><i class="fa fa-heart-o {{$result->favorite == 1 ? 'liked' : ''}}"></i></div>
                                         </div>
                                        <a href="#">
                                            <img class="img-icon" src="{{  $result->thumbnails}}" alt="">
                                        </a>
                                    </div>
                                    <div class="description">
                                        <p>{{ $result->title }}</p>
                                        <span>{{$result->viewCount}} Views / {{$result->date_diff}} month ago / {{$result->category_name}}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <span class="more-detail" style="width: 100%;top: 0;">
                        <a href="{{url('video')}}" style="color: #111111;margin-left: 13px;display: -webkit-inline-box;margin-top: 30px;"><b>MORE</b><img src="{{asset('images/user/top/arrow-1.png')}}"></a></span>
                        @endforelse
                    </div>
                 </div>
            </div>
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
<script src="{{ asset('assets/slick/slick.min.js') }}"></script>
<script type="text/javascript" async defer>
    $(document).ready(function(){
        $("#modal_video").on('hide.bs.modal', function(){
            $("iframe").attr('src', '');
        });
        
        $('.carousel-inner.carosel-video-list').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;"></button>',
            prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;"></button>',
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            ]
        });

        $(document).on('click','#carouselExample .carousel-control-next',function(){
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-last-child(2)')) {
                $('#carouselExample .carousel-control-next').attr('style','display: none !important');
            }else if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExample .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-next',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(2)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: none !important');
            }else if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExampleevent .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExampleevent123 .carousel-control-next',function(){
            if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-last-child(2)') ) {
                $('#carouselExampleevent123 .carousel-control-next').attr('style','display: none !important');
            }else if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-child(1)')){
                $('#carouselExampleevent123 .carousel-control-prev').css('display','block');
            }
        })

        $(document).on('click','#carouselExample .carousel-control-prev',function(){
            if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-last-child(1)')) {
                $('#carouselExample .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExample .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExample .carousel-control-prev').attr('style','display: none !important');
            }
        })

        $(document).on('click','#carouselExampleevent .carousel-control-prev',function(){
            if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-last-child(1)') ) {
                $('#carouselExampleevent .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExampleevent .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExampleevent .carousel-control-prev').attr('style','display: none !important');
            }
        })

        $(document).on('click','#carouselExampleevent123 .carousel-control-prev',function(){
            if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-last-child(1)') ) {
                $('#carouselExampleevent123 .carousel-control-next').attr('style','display: block !important');
            }else if ($('#carouselExampleevent123 .carousel-inner .carousel-item.active').is(':nth-child(2)')){
                $('#carouselExampleevent123 .carousel-control-prev').attr('style','display: none !important');
            }
        })

        if (window.innerWidth > 427) {
            $('.carousel.multi-item-carousel .carousel-item').each(function(){
                var next = $(this).next();
                if (!next.length) {
                next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));

                for (var i=0;i<1;i++) {
                    next=next.next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    next.children(':first-child').clone().appendTo($(this));
                  }
            });
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
            var url = $(this).data('url');
            $('#modal_video .twitter').attr('href','https://twitter.com/intent/tweet?url='+url);
            $('#modal_video .facebook').attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
            $('#modal_video .panel-body').html(src);
            $('#modal_video').modal('show');
        });

        var popupMeta = {
            width: 400,
            height: 400
        }
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

        $(document).on('click','.img-cat-detail',function(e){
            var id = $(this).data('id');
            var _this = $(this);
            $.ajax({
                url : '{{url("search-category-cate?search=")}}'+ id,
                success: function (data) {
                    $('.img-cat-detail.selected').removeClass('selected');
                    $('.content-search').html(data);
                    _this.addClass('selected');
                }
            });
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

        $(document).on('click','.row.event-search .fa.fa-heart-o',function(e){
            e.stopPropagation();
            var idevent = $(this).data('id');
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
