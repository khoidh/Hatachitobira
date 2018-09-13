@extends('layouts.app')
@section('slide')
    @include('includes.slide');
@endsection
@section('css')
    <link href="{{ asset('css/mypage.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
        <h3 id="title">「自分のやりたいことってなんだ？」</h3>
        <div class="container">
            <div id="content" style="width: 60%;margin-left: auto;margin-right: auto">
                <p style="border: 1px solid;padding: 15px;">ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。ハタチのトビラとは？の説明が入ります。
                </p>
                <p style="border: 1px solid #ffff00;padding: 15px;">
                    WHAT IS マイテーマ
                    <br>
                    説明が入ります。説明が入ります。説明が入ります。説明が入ります。
                    <br>
                    説明が入ります。

                </p>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/ObwNpMXlmPU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>

        </div>
    </div>

    <div class="row">
        <h3>マイテーマを見つける理由</h3>
        <div class="container">
            <div id="content" style="width: 60%;margin-left: auto;margin-right: auto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="gallery">
                            <a target="_blank" href="#">
                                <img src="https://www.w3schools.com/css/5terre.jpg" alt="5Terre" width="600" height="400">
                            </a>
                            <div class="desc">Add a description of the image here</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery">
                            <a target="_blank" href="#">
                                <img src="https://www.w3schools.com/css/img_forest.jpg" alt="Forest" width="600" height="400">
                            </a>
                            <div class="desc">Add a description of the image here</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gallery">
                            <a target="_blank" href="#">
                                <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Northern Lights" width="600"
                                     height="400">
                            </a>
                            <div class="desc">Add a description of the image here</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>マイテーマの見つけ方</h3>
        <div class="container">
            <div style="width: 60%;margin-right: auto;margin-left: auto">
                    <div>
                        <h4>■ あなたが興味のあることから深ぼろう</h4>
                        <img src="{{asset('image/search.png')}}" style="width: 100%">
                    </div>
                    <div>
                        <h4>■ 社会を知る</h4>
                        <p>
                            学生が社会人の1日に密着し、仕事ぶりやキャリア観について観察・対話する
                            <br>
                            ジョブシャドウイング動画からリアルな社会を知り、自分の選択肢を広げる
                        </p>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/alBnG2esflw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <div>
                        <h4>■ イベントに参加する</h4>
                        <p>キャリアに対する考え方を社会人から聞いて、マイテーマを見つけるワークショップに参加しよう
                        </p>
                        <div style="text-align: center; margin: 20px 0px">
                            <a href="{{route('event.index')}}"
                               style=" padding: 10px 50px; border: 1px solid #f9ca24; color: #f9ca24;">イベント一覧を見てみる
                            </a>
                        </div>

                    </div>

                <div class="event-information" style="margin-top: 30px">
                    <div class="panel-body">
                        <div class="clearfix">
                            <h4>■ マイテーマについて知る</h4>
                        </div>
                        <div class="content-text">
                            <div class="item">
                                <div class="wrapper">
                                    <div class="icon">
                                        <img src="{{asset('image/mypage/image_mypage.png')}}" >
                                        <i class="fa fa-heart-o" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="content clearfix" >
                                        <div class="status clearfix"><p class="text-status">インタビュー</p></div>
                                        <div class="title clearfix "><p class="text-title">タイトルタイトルタイトルタイトルタイトル</p></div>
                                        <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-text">
                            <div class="item">
                                <div class="wrapper">
                                    <div class="icon">
                                        <img src="{{asset('image/mypage/image_mypage.png')}}" >
                                        <i class="fa fa-heart-o" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="content clearfix" >
                                        <div class="status clearfix"><p class="text-status">インタビュー</p></div>
                                        <div class="title clearfix "><p class="text-title">タイトルタイトルタイトルタイトルタイトル</p></div>
                                        <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-text">
                            <div class="item">
                                <div class="wrapper">
                                    <div class="icon">
                                        <img src="{{asset('image/mypage/image_mypage.png')}}" >
                                        <i class="fa fa-heart-o" style="font-size: 24px;"></i>
                                    </div>
                                    <div class="content clearfix" >
                                        <div class="status clearfix"><p class="text-status">インタビュー</p></div>
                                        <div class="title clearfix "><p class="text-title">タイトルタイトルタイトルタイトルタイトル</p></div>
                                        <div class="date clearfix"><p class="text-date">2018.3.20</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 20px; margin-bottom: 20px; text-align: center;">
                            <a href="" style="padding: 10px 50px; border: 1px solid white; color: white">もっと見る</a>
                        </div>

                    </div>
                </div>
                <div style="text-align: center;position: relative; margin-top: 50px">
                    <a href="#" style="padding: 10px 50px;background: #f9ca24; color: ghostwhite;font-weight: bold;">マイテーマを見つける</a>
                </div>
            </div>

        </div>
    </div>

@endsection