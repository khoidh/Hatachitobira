@extends('layouts.app')
@section('content')
    <script>
        $(function () {

            $('.favorite').click(function () {
                var user_id= $(this).find('.user_id').val();
                var column_id= $(this).find('.column_id').val();
                var favorite= $(this).find('.fa-heart-o');
                if(user_id) {
                    $.ajax({
                        type: "POST",
                        url: '{{route('column.favorite')}}', // This is what I have updated
                        data: {user_id: user_id, column_id: column_id},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    }).done(function (msg) {
                         alert(msg);
                         favorite.css('color', 'red');
                    });
                }
                else
                {
                    // Todo: Messege yêu cầu user đăng nhập
                }
            });
        })
    </script>

    <div class="row">
        <h3>コラム</h3>
        <div class="container">
            <div class="column">
                <div class="item">
                    <div class="wrapper">
                        <div class="icon">
                            <img src="{{asset('image/column/'.$column->image)}}">
                            <button type="button" class="favorite">
                                <input type="hidden" class="favorite"    value="1">
                                <input type="hidden" class="user_id"     value="<?php echo Auth::user()->id?>">
                                <input type="hidden" class="column_id"   value="<?php echo $column->id?>">
                                <i class="fa fa-heart-o" value="123" style="font-size:24px;"></i>
                            </button>
                        </div>
                        <div class="content">
                            <div class="status"><h4>インタビュー</h4></div>
                            <div class="title"><p>{{$column->title}}</p></div>
                            <div class="category"><p>カテゴリ</p></div>
                            <div class="date"><p>{{$column->created_at}}</p></div>
                        </div>
                    </div>
                    <div class="description"><p>{{$column->description}}</p></div>
                </div>
            </div>
            {{--  Xử lý đăng ký column--}}
            <form method="POST"  action="/column">
                {{ csrf_field() }}
                <input type="hidden" name="register" value="1">
                <input type="hidden" name="user_id" value="<?php echo Auth::user()->id?>">
                <input type="hidden" name="column_id" value="<?php echo $column->id?>">
                <button type="submit" value="Submit" class="btn btn-info">マイテーマを見つける</button>
            </form>
        </div>

    </div>

@endsection