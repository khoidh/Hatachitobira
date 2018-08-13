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
                @foreach($events as $event)
                <div class="item">
                    <div class="wrapper">
                        <div class="icon">
                            <a href="{{route('event.show', $event->id)}}">
                                <img src="{{asset('image/event/'.$event->image)}}" >
                                <form action="{{route('event.favorite')}}" method="post" name="favorite-form">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="favorite" value="1">
                                    <input type="hidden" name="user_id" value="<?php if(Auth::user()) echo Auth::user()->id?>">
                                    <input type="hidden" name="event_id" value="<?php echo $event->id?>">
                                    <button  type="submit">
                                        <i class="fa fa-heart-o" style="font-size:24px;"></i>
                                    </button>
                                    <!-- <a class="submit"><i class="fa fa-heart-o" style="font-size:24px;"></i></a> -->

                                </form>
                            </a>
                        </div>
                        <div class="content">
                            <div class="status">

                                {{-- TODO xử lý check thời gian đăng ký--}}

                                <h4>申し込み受付中
                                </h4>
                            </div>
                            <div class="title">
                                <p>
                                    {{$event->title}}
                                </p>
                            </div>
                            <div class="category">
                                <p>{{$event->category_name}}
                                </p>
                            </div>
                            <div class="date">
                                <p>
                                    {{$event->time_from}}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                    @endforeach
                    {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
