@extends('layouts.app')
@section('slide')
    @include('includes.slide');
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

                <div class="gallery">
                <a target="_blank" href="#">
                    <img src="https://www.w3schools.com/css/5terre.jpg" alt="5Terre" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>

                <div class="gallery">
                <a target="_blank" href="#">
                    <img src="https://www.w3schools.com/css/img_forest.jpg" alt="Forest" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>

                <div class="gallery">
                <a target="_blank" href="#">
                    <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Northern Lights" width="600" height="400">
                </a>
                <div class="desc">Add a description of the image here</div>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>マイテーマの見つけ方</h3>
        <div class="container">
            <div style="width: 60%;margin-right: auto;margin-left: auto">
                <ul style="list-style-type: square">
                    <li>
                        <h4><u>あなたが興味のあることから深ぼろう</u></h4>
                        <img src="{{asset('image/search.png')}}" style="width: 100%">
                    </li>
                    <li>
                        <h4><u>社会を知る</u></h4>
                        <p>
                            学生が社会人の1日に密着し、仕事ぶりやキャリア観について観察・対話する
                            <br>
                            ジョブシャドウイング動画からリアルな社会を知り、自分の選択肢を広げる
                        </p>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/alBnG2esflw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </li>
                    <li>
                        <h4><u>イベントに参加する</u></h4>
                        <p>キャリアに対する考え方を社会人から聞いて、マイテーマを見つけるワークショップに参加しよう
                        </p>
                        <a class="btn btn-info" href="#">イベント一覧を見てみる
                        </a>
                    </li>
                    <li>
                        <h4><u>マイテーマについて知る</u></h4>
                    </li>
                </ul>
            </div>


        </div>
    </div>

@endsection