@extends('layouts.app')
@section('content')

    <div class="row">
        <h3>コラム</h3>
        <div class="container">
            <div class="column">
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
                @foreach($columns as $column)
                    <div class="item">
                        <div class="wrapper">
                            <div class="icon">
                                <a href="{{route('column.show', $column->id)}}">
                                    @php $image='image/column/'.$column->image; @endphp
                                    <img src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">
                                </a>

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

                            </div>
                            <div class="content" >
                                <a href="{{route('column.show', $column->id)}}">
                                    {{--<div class="status"><a href="#"><h4>インタビュー</h4></a></div>--}}
                                    <div class="status"><h4>インタビュー</h4></div>
                                    <div class="title"><p>{{$column->title}}</p></div>
                                    <div class="category"><p>{{$column->category_name}}</p></div>
                                    <div class="date"><p>{{$column->created_at}}</p></div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $columns->links() }}
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    @parent
    <script>
        $(function () {
            $('.favorite').click(function() {
                var user_id= $(this).find('.user_id').val();
                var column_id= $(this).find('.column_id').val();
                var favorite= $(this).find('.fa-heart-o');
                if(user_id) {
                    // alert($favorites_id)
                    $.ajax({
                        type: "POST",
                        url: '{{route('column.favorite')}}', // This is what I have updated
                        data: {user_id: user_id, column_id: column_id},
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