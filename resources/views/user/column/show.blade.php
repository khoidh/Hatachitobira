@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/event.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/video.css') }}" rel="stylesheet">--}}
        <link href="{{ asset('css/column.css') }}" rel="stylesheet">
    <link rel='stylesheet' id='style-css'
          href='https://originalpoint.co.jp/wp-content/themes/orion_tcd037/style.css?ver=2.2.1' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='contact-form-7-css'  href='https://originalpoint.co.jp/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='sab-plugin-css'  href='https://originalpoint.co.jp/wp-content/plugins/simple-author-box/css/simple-author-box.min.css?ver=v1.5' type='text/css' media='all' />

@endsection
@section('content')
    <div id="main_contents" class="clearfix">
        <div id="bread_crumb">
            <ul class="clearfix">
                <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb" class="home"><a
                            itemprop="url" href="#"><span>ホーム</span></a></li>

                <li><a href="#">レポート一覧</a></li>
                <li><a href="#" rel="category tag">採用領域</a></li>
                <li class="last">{{$column->title}}</li>

            </ul>
        </div>

        <div id="main_col" class="clearfix">
            <div id="left_col">
                <div id="article">
                    <ul id="post_meta_top" class="clearfix">
                    </ul>
                    <h2 id="post_title" class="rich_font">{{$column->title}}</h2>

                    <div class="single_share clearfix" id="single_share_top">

                        <!--Type1-->

                        <!--Type2-->

                        <!--Type3-->

                        <!--Type4-->

                        <!--Type5-->
                        <div id="share5_top">
                            <div class="sns_default_top">
                                <ul class="clearfix">
                                    <!-- Twitterボタン -->
                                    <li class="default twitter_button">
                                        <iframe id="twitter-widget-0" scrolling="no" frameborder="0"
                                                allowtransparency="true"
                                                class="twitter-share-button twitter-share-button-rendered twitter-tweet-button"
                                                style="position: static; visibility: visible; width: 75px; height: 20px;"
                                                title="Twitter Tweet Button"
                                                src="https://platform.twitter.com/widgets/tweet_button.5b37191c1b7fd23797a519962bf78683.ja.html#dnt=false&amp;id=twitter-widget-0&amp;lang=ja&amp;original_referer=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;size=m&amp;text=%E6%8E%A1%E7%94%A8%E6%8B%85%E5%BD%93%E8%80%85%C3%97%E5%A4%A7%E5%AD%A6%E7%94%9F%E3%81%A7%E8%80%83%E3%81%88%E3%82%8B%E3%80%81%E6%8E%A1%E7%94%A8%E3%81%AB%E3%81%8A%E3%81%91%E3%82%8B%E3%82%B8%E3%83%A7%E3%83%96%E3%82%B7%E3%83%A3%E3%83%89%E3%82%A6%E3%82%A4%E3%83%B3%E3%82%B0%E6%98%A0%E5%83%8F%E5%8C%96%E3%81%AE%E5%8A%B9%E6%9E%9C%E3%81%A8%E3%81%AF%EF%BC%9F%E3%80%9C%E3%83%8F%E3%82%BF%E3%83%81%E3%81%AE%E3%83%88%E3%83%93%E3%83%A9%E3%81%AE%E9%AD%85%E5%8A%9B%E3%81%AB%E8%BF%AB%E3%82%8B%E3%80%9C%20%7C%20Original%20Point%20%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE&amp;time=1535111043916&amp;type=share&amp;url=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F"
                                                __idm_frm__="1407"></iframe>
                                        <script>!function (d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0],
                                                    p = /^http:/.test(d.location) ? 'http' : 'https';
                                                if (!d.getElementById(id)) {
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = p + '://platform.twitter.com/widgets.js';
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }
                                            }(document, 'script', 'twitter-wjs');</script>
                                    </li>

                                    <!-- Facebookいいねボタン -->
                                    <li class="default fblike_button">
                                        <div class="fb-like fb_iframe_widget"
                                             data-href="https://originalpoint.co.jp/recruit/013/" data-send="false"
                                             data-layout="button_count" data-width="450" data-show-faces="false"
                                             fb-xfbml-state="rendered"
                                             fb-iframe-plugin-query="app_id=249643311490&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450">
                                            <span style="vertical-align: bottom; width: 88px; height: 20px;"><iframe
                                                        name="f3ba8ab3b881b64" width="450px" height="1000px"
                                                        frameborder="0" allowtransparency="true" allowfullscreen="true"
                                                        scrolling="no" allow="encrypted-media"
                                                        title="fb:like Facebook Social Plugin"
                                                        src="https://www.facebook.com/v2.3/plugins/like.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df1118cb197d60b8%26domain%3Doriginalpoint.co.jp%26origin%3Dhttps%253A%252F%252Foriginalpoint.co.jp%252Ff321bcfe3351984%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450"
                                                        style="border: none; visibility: visible; width: 88px; height: 20px;"
                                                        __idm_frm__="1411" class=""></iframe></span></div>
                                    </li>

                                    <!-- Facebookシェアボタン -->
                                    <li class="default fbshare_button2">
                                        <div class="fb-share-button fb_iframe_widget"
                                             data-href="https://originalpoint.co.jp/recruit/013/"
                                             data-layout="button_count" fb-xfbml-state="rendered"
                                             fb-iframe-plugin-query="app_id=249643311490&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey">
                                            <span style="vertical-align: bottom; width: 72px; height: 20px;"><iframe
                                                        name="f2d8c29c1e7551c" width="1000px" height="1000px"
                                                        frameborder="0" allowtransparency="true" allowfullscreen="true"
                                                        scrolling="no" allow="encrypted-media"
                                                        title="fb:share_button Facebook Social Plugin"
                                                        src="https://www.facebook.com/v2.3/plugins/share_button.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df8ca6ad5b6ebf%26domain%3Doriginalpoint.co.jp%26origin%3Dhttps%253A%252F%252Foriginalpoint.co.jp%252Ff321bcfe3351984%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey"
                                                        style="border: none; visibility: visible; width: 72px; height: 20px;"
                                                        __idm_frm__="1412" class=""></iframe></span></div>
                                    </li>

                                    <!-- Google+ボタン -->
                                    <li class="default google_button">
                                        <script type="text/javascript">
                                            window.___gcfg = {lang: 'ja'};
                                            (function () {
                                                var po = document.createElement('script');
                                                po.type = 'text/javascript';
                                                po.async = true;
                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0];
                                                s.parentNode.insertBefore(po, s);
                                            })();
                                        </script>
                                        <div class="socialbutton gplus-button">
                                            <div id="___plusone_0"
                                                 style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                                                <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0"
                                                        marginwidth="0" scrolling="no"
                                                        style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;"
                                                        tabindex="0" vspace="0" width="100%" id="I0_1535111043366"
                                                        name="I0_1535111043366"
                                                        src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=ja&amp;origin=https%3A%2F%2Foriginalpoint.co.jp&amp;url=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.yV8STZJe56k.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPujI_WfWcBMG26Bk6fH_OsJiWWQQ%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1535111043366&amp;_gfid=I0_1535111043366&amp;parent=https%3A%2F%2Foriginalpoint.co.jp&amp;pfname=&amp;rpctoken=39654640"
                                                        data-gapiattached="true" title="G+"></iframe>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="po st_image">
                        @php $image='image/column/'.$column->image; @endphp
                        <img width="840" height="580"
                             src="{{file_exists($image)?asset($image):asset('image/column/column_default.jpg')}}"
                             class="attachment-size5 size-size5 wp-post-image" alt="" scale="0">
                    </div>

                    <div class="post_content clearfix">
                        {!! $column->content !!}
                    </div>

                    <div class="single_share" id="single_share_bottom">

                        <!--Type1-->

                        <!--Type2-->

                        <!--Type3-->

                        <!--Type4-->

                        <!--Type5-->
                        <div id="share5_btm">

                            <div class="sns_default_top">
                                <ul class="clearfix">
                                    <!-- favoriteボタン -->
                                    <li class="icon">
                                        {{--==================== favorite ====================--}}
                                        @if(Auth::user())
                                            {{ csrf_field() }}
                                            <div type="submit" class="favorite">
                                                <input type="hidden" class="favorite" value="0">
                                                <input type="hidden" class="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" class="column_id" value="{{$column->id}}">
                                                {{--<input type="hidden" class="$favorites_id" value="{{$column->id}}">--}}
                                                @if(in_array($column->id,$favorites_id))
                                                    <i class="fa fa-heart-o" style="font-size:24px; color: red;" ></i>
                                                @else
                                                    <i class="fa fa-heart-o" style="font-size:24px; color: blue;"></i>
                                                @endif
                                            </div>
                                        @else
                                            <div type="submit">
                                                <i class="fa fa-heart-o" style="font-size:24px;" data-toggle="modal"
                                                   data-target="#modal_login"> </i>
                                            </div>
                                        @endif
                                        {{--==================== /end favorite ====================--}}

                                    </li>

                                    <!-- Twitterボタン -->
                                    <li class="default twitter_button">
                                        <iframe id="twitter-widget-1" scrolling="no" frameborder="0"
                                                allowtransparency="true"
                                                class="twitter-share-button twitter-share-button-rendered twitter-tweet-button"
                                                style="position: static; visibility: visible; width: 75px; height: 20px;"
                                                title="Twitter Tweet Button"
                                                src="https://platform.twitter.com/widgets/tweet_button.5b37191c1b7fd23797a519962bf78683.ja.html#dnt=false&amp;id=twitter-widget-1&amp;lang=ja&amp;original_referer=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;size=m&amp;text=%E6%8E%A1%E7%94%A8%E6%8B%85%E5%BD%93%E8%80%85%C3%97%E5%A4%A7%E5%AD%A6%E7%94%9F%E3%81%A7%E8%80%83%E3%81%88%E3%82%8B%E3%80%81%E6%8E%A1%E7%94%A8%E3%81%AB%E3%81%8A%E3%81%91%E3%82%8B%E3%82%B8%E3%83%A7%E3%83%96%E3%82%B7%E3%83%A3%E3%83%89%E3%82%A6%E3%82%A4%E3%83%B3%E3%82%B0%E6%98%A0%E5%83%8F%E5%8C%96%E3%81%AE%E5%8A%B9%E6%9E%9C%E3%81%A8%E3%81%AF%EF%BC%9F%E3%80%9C%E3%83%8F%E3%82%BF%E3%83%81%E3%81%AE%E3%83%88%E3%83%93%E3%83%A9%E3%81%AE%E9%AD%85%E5%8A%9B%E3%81%AB%E8%BF%AB%E3%82%8B%E3%80%9C%20%7C%20Original%20Point%20%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE&amp;time=1535111043917&amp;type=share&amp;url=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F"
                                                __idm_frm__="1408"></iframe>
                                        <script>!function (d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0],
                                                    p = /^http:/.test(d.location) ? 'http' : 'https';
                                                if (!d.getElementById(id)) {
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = p + '://platform.twitter.com/widgets.js';
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }
                                            }(document, 'script', 'twitter-wjs');</script>
                                    </li>

                                    <!-- Facebookシェアボタン -->
                                    <li class="default fbshare_button2">
                                        <div class="fb-share-button fb_iframe_widget"
                                             data-href="https://originalpoint.co.jp/recruit/013/"
                                             data-layout="button_count" fb-xfbml-state="rendered"
                                             fb-iframe-plugin-query="app_id=249643311490&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey">
                                            <span style="vertical-align: bottom; width: 72px; height: 20px;"><iframe
                                                        name="fa6e5df9efab7c" width="1000px" height="1000px"
                                                        frameborder="0" allowtransparency="true" allowfullscreen="true"
                                                        scrolling="no" allow="encrypted-media"
                                                        title="fb:share_button Facebook Social Plugin"
                                                        src="https://www.facebook.com/v2.3/plugins/share_button.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df5e735bc89215%26domain%3Doriginalpoint.co.jp%26origin%3Dhttps%253A%252F%252Foriginalpoint.co.jp%252Ff321bcfe3351984%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;layout=button_count&amp;locale=ja_JP&amp;sdk=joey"
                                                        style="border: none; visibility: visible; width: 72px; height: 20px;"
                                                        __idm_frm__="1415" class=""></iframe></span></div>
                                    </li>

                                    <!-- Google+ボタン -->
                                    <li class="default google_button">
                                        <script type="text/javascript">
                                            window.___gcfg = {lang: 'ja'};
                                            (function () {
                                                var po = document.createElement('script');
                                                po.type = 'text/javascript';
                                                po.async = true;
                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0];
                                                s.parentNode.insertBefore(po, s);
                                            })();
                                        </script>
                                        <div class="socialbutton gplus-button">
                                            <div id="___plusone_1"
                                                 style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;">
                                                <iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0"
                                                        marginwidth="0" scrolling="no"
                                                        style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;"
                                                        tabindex="0" vspace="0" width="100%" id="I1_1535111043372"
                                                        name="I1_1535111043372"
                                                        src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=ja&amp;origin=https%3A%2F%2Foriginalpoint.co.jp&amp;url=https%3A%2F%2Foriginalpoint.co.jp%2Frecruit%2F013%2F&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.yV8STZJe56k.O%2Fam%3DwQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPujI_WfWcBMG26Bk6fH_OsJiWWQQ%2Fm%3D__features__#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I1_1535111043372&amp;_gfid=I1_1535111043372&amp;parent=https%3A%2F%2Foriginalpoint.co.jp&amp;pfname=&amp;rpctoken=23692044"
                                                        data-gapiattached="true" title="G+"></iframe>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="previous_next_post" class="clearfix">
                        <div class="prev_post"><p class="label">PREV</p><a href="{{route('column.show', $previous->id)}}"
                                                                           title="{{$previous->title}}"><img
                                        width="200" height="200" src="#"
                                        class="attachment-size1 size-size1 wp-post-image" alt=""
                                        srcset="https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-200x200.jpg 200w, https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-150x150.jpg 150w, https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-120x120.jpg 120w"
                                        sizes="(max-width: 200px) 100vw, 200px"><span class="title">{{$previous->title}}</span></a>
                        </div>
                        <div class="next_post"><p class="label">NEXT</p><a href="{{route('column.show', $next->id)}}"
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
                        @foreach($columns_random as $column)
                        <li class="clearfix num1">
                            <a class="image" href="{{route('column.show', $column->id)}}"><img width="500"
                                                                                                 height="347"
                                                                                                 src="https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-500x347.jpg"
                                                                                                 class="attachment-size2 size-size2 wp-post-image"
                                                                                                 alt="" srcset="https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-500x347.jpg 500w,
                                                                                                  https://originalpoint.co.jp/wp-content/uploads/2017/10/a6354a2f677436097ccd391f43cb9a76-300x207.jpg 300w"
                                                                                                 sizes="(max-width: 500px) 100vw, 500px"></a>
                            <div class="desc">
                                <h4 class="title"><a href="{{route('column.show', $column->id)}}" name="">{{str_limit($column->title,$limit=50,$end='...')}}</a>
                                    {{--str_limit($column->description, $limit = 150, $end = '...')--}}
                                </h4>
                            </div>

                        </li>
                        @endforeach
                        {{--<li class="clearfix num2">--}}
                            {{--<a class="image" href="https://originalpoint.co.jp/recruit/04/"><img width="500"--}}
                                                                                                 {{--height="347"--}}
                                                                                                 {{--src="https://originalpoint.co.jp/wp-content/uploads/2017/03/eye02-500x347.png"--}}
                                                                                                 {{--class="attachment-size2 size-size2 wp-post-image"--}}
                                                                                                 {{--alt="" scale="0"></a>--}}
                            {{--<div class="desc">--}}
                                {{--<h4 class="title"><a href="https://originalpoint.co.jp/recruit/04/" name="">経営者確約採用”の次に仕掛ける、打ち上げ花火で終わらないインターンシップとは？</a>--}}
                                {{--</h4>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix num3">--}}
                            {{--<a class="image" href="https://originalpoint.co.jp/recruit/011/"><img width="500"--}}
                                                                                                  {{--height="347"--}}
                                                                                                  {{--src="https://originalpoint.co.jp/wp-content/uploads/2017/12/c478b1a6dedb96603a486610161ab963-500x347.jpg"--}}
                                                                                                  {{--class="attachment-size2 size-size2 wp-post-image"--}}
                                                                                                  {{--alt="" scale="0"></a>--}}
                            {{--<div class="desc">--}}
                                {{--<h4 class="title"><a href="https://originalpoint.co.jp/recruit/011/" name="">人事主導から現場主導インターンシップへ！--}}
                                        {{--担当者の涙が物語る採用活動の価値とは？</a></h4>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix num4">--}}
                            {{--<a class="image" href="https://originalpoint.co.jp/recruit/08/"><img width="500"--}}
                                                                                                 {{--height="347"--}}
                                                                                                 {{--src="https://originalpoint.co.jp/wp-content/uploads/2017/07/top-500x347.jpg"--}}
                                                                                                 {{--class="attachment-size2 size-size2 wp-post-image"--}}
                                                                                                 {{--alt="" scale="0"></a>--}}
                            {{--<div class="desc">--}}
                                {{--<h4 class="title"><a href="https://originalpoint.co.jp/recruit/08/" name="">神戸大学--}}
                                        {{--金井壽宏教授と考える、新卒採用におけるRJP理論の可能性とは？（RJP=リアリスティック・…</a></h4>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="clearfix num5">--}}
                            {{--<a class="image" href="https://originalpoint.co.jp/recruit/03/"><img width="500"--}}
                                                                                                 {{--height="347"--}}
                                                                                                 {{--src="https://originalpoint.co.jp/wp-content/uploads/2017/03/icf_top-500x347.jpg"--}}
                                                                                                 {{--class="attachment-size2 size-size2 wp-post-image"--}}
                                                                                                 {{--alt="" scale="0"></a>--}}
                            {{--<div class="desc">--}}
                                {{--<h4 class="title"><a href="https://originalpoint.co.jp/recruit/03/" name="">人事主体から現場主体の採用への転換を図るきっかけとなる“面接官トレーニング研修</a>--}}
                                {{--</h4>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    </ol>
                </div>


                <!-- banner2 -->

            </div><!-- END #left_col -->


            <div id="side_col">
                <div class="side_widget clearfix widget_search" id="search-2">
                    <form role="search" method="get" id="searchform" class="searchform"
                          action="https://originalpoint.co.jp/">
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
                        <li>
                            <a href="https://originalpoint.co.jp/hd/018/">バブル知らない世代vsバブル知っている世代〜18卒新入社員のキャリア観とは〜</a>
                        </li>
                        <li>
                            <a href="https://originalpoint.co.jp/univ/017/">「やりたいこと探しはもうやめよう」ハタチのトビラTalk02 開催レポート</a>
                        </li>
                        <li>
                            <a href="https://originalpoint.co.jp/univ/016/">大学生が学ぶべきリーダーシップとは!? アイセック明治大学とリード・ザ・セルフ</a>
                        </li>
                        <li>
                            <a href="https://originalpoint.co.jp/univ/015/">マイテーマを探求するって何だ！？ハタチのトビラ Talk01 開催レポート</a>
                        </li>
                        <li>
                            <a href="https://originalpoint.co.jp/univ/014/">大学1・2年生が働くを体感する意味とは？ビジネスシミュレーションという新たな選択肢</a>
                        </li>
                    </ul>
                </div>
                <div class="side_widget clearfix widget_categories" id="categories-2">
                    <h3 class="side_headline"><span>カテゴリー</span></h3>
                    <ul>
                        <li class="cat-item cat-item-7"><a href="https://originalpoint.co.jp/category/hd/">人材開発領域</a>
                        </li>
                        <li class="cat-item cat-item-4"><a href="https://originalpoint.co.jp/category/column/">代表コラム</a>
                        </li>
                        <li class="cat-item cat-item-2"><a href="https://originalpoint.co.jp/category/univ/">大学領域</a>
                        </li>
                        <li class="cat-item cat-item-3"><a href="https://originalpoint.co.jp/category/recruit/">採用領域</a>
                        </li>
                        <li class="cat-item cat-item-5"><a href="https://originalpoint.co.jp/category/od/">組織開発領域</a>
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
                    <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/originalpoint.inc/"
                         data-width="340" data-height="432" data-hide-cover="false" data-show-facepile="true"
                         data-show-posts="false" fb-xfbml-state="rendered"
                         fb-iframe-plugin-query="app_id=249643311490&amp;container_width=0&amp;height=432&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Foriginalpoint.inc%2F&amp;locale=ja_JP&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;width=340">
                        <span style="vertical-align: bottom; width: 340px; height: 180px;"><iframe
                                    name="f389d9135448e84" width="340px" height="432px" frameborder="0"
                                    allowtransparency="true" allowfullscreen="true" scrolling="no"
                                    allow="encrypted-media" title="fb:page Facebook Social Plugin"
                                    src="https://www.facebook.com/v2.3/plugins/page.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FQX17B8fU-Vm.js%3Fversion%3D42%23cb%3Df2f9b83ba04989c%26domain%3Doriginalpoint.co.jp%26origin%3Dhttps%253A%252F%252Foriginalpoint.co.jp%252Ff321bcfe3351984%26relation%3Dparent.parent&amp;container_width=0&amp;height=432&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Foriginalpoint.inc%2F&amp;locale=ja_JP&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;width=340"
                                    style="border: none; visibility: visible; width: 340px; height: 180px;"
                                    __idm_frm__="1419" class=""></iframe></span></div>
                </div>
            </div>


        </div><!-- END #main_col -->


    </div>

@endsection