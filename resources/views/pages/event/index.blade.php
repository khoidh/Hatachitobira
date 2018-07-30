@extends('layouts.app')
@section('content')
    <div class="row">
        <h3>イベント</h3>
        <div class="container">
            <div class="event">
                <div class="info">
                <p>『 社会人 生活への移行期である貴重な 4年間 』
                </p>
                <p>だからこそ、ちょっと先の自分や 未来 について考える 機会 がたまにはあってもいいのではないでしょうか。
                </p>
                <p>「 やりたい をカタチにできる 社会 」を目指す Original Point（株）が、20歳 前後（アラハタ）の 学生向けに開催している“ハタチのトビラ”
                </p>
                <p>8月 はTalk.01 ゲスト の郡司淳史さんが手がけるお茶「VAISA」を飲みながら、ちょっと真面目に 未来 について考え、 対話 する時間をお届けします。
                </p>
                </p>
            </div>
                <div class="item">
                    <div class="wrapper">
                        <div class="icon">
                            <img src="{{asset('image/event-icon.jpg')}}" alt="">
                            <a href=""><i class="fa fa-heart-o" style="font-size:24px;"></i></a>
                        </div>
                        <div class="content">
                            <div class="status">
                                <h4>申し込み受付中
                                </h4>
                            </div>
                            <div class="title">
                                <p>タイトルタイトルタイトルタイトルタイトル
                                </p>
                            </div>
                            <div class="category">
                                <p>カテゴリ
                                </p>
                            </div>
                            <div class="date">
                                <p>2018.3.20
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection