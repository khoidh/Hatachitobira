@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event.css') }}" rel="stylesheet">
    <link rel='stylesheet' id='style-css' href="{{ asset('css/style.2.2.1.css') }}" type='text/css' media='all'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .fa-heart-o{
            cursor: pointer !important;
        }
        .favorite{
            height: 0 !important;
        }
    </style>
@endsection
@section('content')
    <div id="main_contents" class="clearfix">
        <div id="bread_crumb">
            <ul class="clearfix">
                <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb" class="home"><a itemprop="url" href="{{ url('/') }}"><span>ホーム</span></a></li>

                <li><a href="{{route('event.index')}}">イベント一覧</a></li>
                <li class="last">{{$event->title}}</li>

            </ul>
            {{--<ul class="clearfix">--}}

            {{--<li><a href="https://originalpoint.co.jp/"><span class="glyphicon glyphicon-home"></span></a></li>--}}
            {{--<li itemscope="itemscope" itemtype="#" class="home"><a itemprop="url" href="#"><span>ホーム</span></a></li>--}}
            {{--<li><a href="{{route('event.index')}}">記事から知る</a></li>--}}
            {{--<li class="last">{{$event->title}}</li>--}}

            {{--</ul>--}}
        </div>

        <div id="main_col" class="clearfix">
            <div id="left_col">
                <div id="article">
                    <ul id="post_meta_top" class="clearfix">
                    </ul>
                    <h2 id="post_title" class="rich_font">{{$event->title}}</h2>

                    {{--Tieu de tren noi dung--}}
                    <div class="row" style="line-height: 200%;">
                        <div class="col-md-6">
                            {{--<a href="#">--}}
                            @php $image='image/event/'.$event->image; @endphp
                            <img width="100%" src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                            {{--</a>--}}
                        </div>
                        <div class="col-md-6">
                            <div class="item">
                                <div class="wrapper">
                                    <div class="content" >
                                        {{--<a href="#">--}}
                                        {{--<div class="status"><a href="#"><h4>インタビュー</h4></a></div>--}}
                                        {{--<div class="status"><h4>インタビュー</h4></div>--}}
                                        <div class="title" style="color: #216A94;"><h4 style="line-height: 200%">{{$event->title}}</h4></div>
                                        {{--                                            <div class="title"><p>{{$event->title}}</p></div>--}}
                                        <div class="category"><p>{{$event->category_name}}</p></div>
                                        <div class="date"><p>{{$event->created_at}}</p></div>
                                        {{--</a>--}}
                                    </div>
                                    <div class="icon">

                                        {{--==================== favorite ====================--}}
                                        @if(Auth::user())
                                            {{ csrf_field() }}
                                            <div type="submit" class="favorite">
                                                <input type="hidden" class="favorite" value="0">
                                                <input type="hidden" class="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" class="event_id" value="{{$event->id}}">
                                                {{--<input type="hidden" class="$favorites_id" value="{{$event->id}}">--}}
                                                @if(in_array($event->id,$favorites_id))
                                                    <i class="fa fa-heart-o" style="font-size:24px; color: red;" ></i>
                                                @else
                                                    <i class="fa fa-heart-o" style="font-size:24px; color: blue;"></i>
                                                @endif
                                            </div>
                                        @else
                                            <div type="submit">
                                                <i class="fa fa-heart-o" style="font-size:24px; color: blue;" data-toggle="modal"
                                                   data-target="#modal_login"> </i>
                                            </div>
                                        @endif
                                        {{--==================== /end favorite ====================--}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="post_content clearfix">
                        {!! $event->content !!}
                    </div>

                    <div id="previous_next_post" class="clearfix">
                        <div class="prev_post"><p class="label">PREV</p><a href="#"
                                                                           title="{{$previous->title}}"><img
                                        width="200" height="200" src="#"
                                        class="attachment-size1 size-size1 wp-post-image" alt=""
                                        srcset="https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-200x200.jpg 200w, https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-150x150.jpg 150w, https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-120x120.jpg 120w"
                                        sizes="(max-width: 200px) 100vw, 200px"><span class="title">{{$previous->title}}</span></a>
                        </div>
                        <div class="next_post"><p class="label">NEXT</p><a href="{{route('event.show', $next->id)}}"
                                                                           title="{{$next->title}}"><img
                                        width="200" height="200" src="#"
                                        class="attachment-size1 size-size1 wp-post-image" alt=""
                                        srcset="https://originalpoint.co.jp/wp-content/uploads/2018/02/IMG_0873-200x200.jpg 200w, https://originalpoint.co.jp/wp-content/uploads/2018/02/IMG_0873-150x150.jpg 150w, https://originalpoint.co.jp/wp-content/uploads/2018/02/IMG_0873-120x120.jpg 120w"
                                        sizes="(max-width: 200px) 100vw, 200px"><span class="title">{{$next->title}}</span></a>
                        </div>
                    </div>

                </div><!-- END #article -->

                <!-- banner1 -->
                <div id="related_post">
                    <h3 class="headline"><span>関連記事一覧</span></h3>
                    <ol class="clearfix">
                        @foreach($events_random as $event)
                            <li class="clearfix num1">
                                <a class="image" href="{{route('event.show', $event->id)}}"><img width="500"
                                                                                                   height="347"
                                                                                                   src="https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-500x347.jpg"
                                                                                                   class="attachment-size2 size-size2 wp-post-image"
                                                                                                   alt="" srcset="https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-500x347.jpg 500w,
                                                                                                  https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-300x207.jpg 300w"
                                                                                                   sizes="(max-width: 500px) 100vw, 500px"></a>
                                <div class="desc">
                                    <h4 class="title"><a href="{{route('event.show', $event->id)}}" name="">{{str_limit($event->title,$limit=50,$end='...')}}</a>
                                    </h4>
                                </div>

                            </li>
                        @endforeach
                    </ol>
                </div>


                <!-- banner2 -->

            </div><!-- END #left_col -->


            <div id="side_col">
                <div class="side_widget clearfix widget_search" id="search-2">
                    <form role="search" method="get" id="searchform" class="searchform"
                          action="#">
                        {{--action="https://originalpoint.co.jp/">--}}
                        <div>
                            <label class="screen-reader-text" for="s">検索:</label>
                            <input type="text" value="" name="s" id="s">
                            <input type="submit" id="searchsubmit" value="検索">
                        </div>
                    </form>
                </div>
                <div class="side_widget clearfix widget_recent_entries" id="recent-posts-2">
                    <h3 class="side_headline"><span>最近の投稿</span></h3>
                    <ul>
                        @foreach($events_latest as $event)
                            <li>
                                <a href="{{route('event.show', $event->id)}}">{{$event->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="side_widget clearfix widget_categories" id="categories-2">
                    <h3 class="side_headline"><span>カテゴリー</span></h3>
                    <ul>
                        <li class="cat-item cat-item-7"><a href="#">人材開発領域</a>
                        </li>
                        <li class="cat-item cat-item-4"><a href="#">代表コラム</a>
                        </li>
                        <li class="cat-item cat-item-2"><a href="#">大学領域</a>
                        </li>
                        <li class="cat-item cat-item-3"><a href="#">採用領域</a>
                        </li>
                        <li class="cat-item cat-item-5"><a href="#">組織開発領域</a>
                        </li>
                    </ul>
                </div>
                <div class="side_widget clearfix widget_image" id="image-3">
                    <div class="jetpack-image-container"><a target="_blank" href="https://tku-cdrc.jimdo.com"><img
                                    src="http://originalpoint.co.jp/wp-content/uploads/2017/05/careerde.jpg"
                                    class="alignnone" width="300" height="201" scale="0"></a></div>
                </div>
                <div class="side_widget clearfix widget_facebook_likebox" id="facebook-likebox-2">
                    <div id="fb-root" class=" fb_reset">
                        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                            <div></div>
                        </div>
                        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                            <div>
                                <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true"
                                        allowfullscreen="true" scrolling="no" allow="encrypted-media"
                                        id="fb_xdm_frame_https" aria-hidden="true"
                                        title="Facebook Cross Domain Communication Frame" tabindex="-1"
                                        src="https://staticxx.facebook.com/connect/xd_arbiter/r/QX17B8fU-Vm.js?version=42#channel=f321bcfe3351984&amp;origin=https%3A%2F%2Foriginalpoint.co.jp"
                                        style="border: none;" __idm_frm__="1410"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- END #main_col -->
    </div>

@endsection

@section('javascript-add')
    @parent
    <script>
        $(function () {
            $('.favorite').click(function() {
                var user_id= $(this).find('.user_id').val();
                var event_id= $(this).find('.event_id').val();
                var favorite= $(this).find('.fa-heart-o');
                if(user_id) {
                    // alert($favorites_id)
                    $.ajax({
                        type: "POST",
                        url: '{{route('event.favorite')}}', // This is what I have updated
                        data: {user_id: user_id, event_id: event_id},
                        //=========
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    }).done(function (msg) {
                        alert(msg);
                        favorite.css('color', 'red');
                        favorite.css('disabled',true);
                    });
                }
                else
                {
                    // Chưa login
                }
            });
        })
    </script>
@endsection