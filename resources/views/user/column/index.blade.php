@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/column.css') }}" rel="stylesheet">

    <style>
        .content {
            height: 100% !important;
        }

        .status {
            padding: 1px;
            background: #90EE90;
            width: auto;
            text-align: center !important;
        }

        .col-md-2.col-sm-4.col-xs-12,
        .col-md-10.col-sm-8.col-xs-12 {
            height: 100% !important;
            padding: 0 !important;
        }

        .date {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        /*Cho điện thoại*/
        @media (max-width: 767px) {
            .myStyle {
                max-height: 100%;
                height: 100%;
            }
        }

        /*Cho điện laptop, ipad*/
        @media (min-width: 768px ) {
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <h3>コラム</h3>
        <div class="container">
            <div class="column">
                <div class="row">
                    @foreach($columns as $column)
                        <div class="item">
                            <div class="wrapper">
                                <div class="row myStyle">
                                    {{--Left--}}
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                        <div class="content">
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
                                                        <input type="hidden" class="user_id"
                                                               value="{{Auth::user()->id}}">
                                                        <input type="hidden" class="column_id" value="{{$column->id}}">
                                                        <div class="col-md-12 text-right">
                                                            @if(in_array($column->id,$favorites_id))
                                                                <i class="fa fa-heart-o"
                                                                   style="font-size:24px; color: red;"></i>
                                                            @else
                                                                <i class="fa fa-heart-o"
                                                                   style="font-size:24px; color: blue;"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <div type="submit">
                                                        <i class="fa fa-heart-o" style="font-size:24px;"
                                                           data-toggle="modal"
                                                           data-target="#modal_login"> </i>
                                                    </div>
                                                @endif
                                                {{--==================== /end favorite ====================--}}

                                            </div>
                                        </div>

                                    </div>

                                    {{--Right--}}
                                    <div class="col-md-10 col-sm-8 col-xs-12">
                                        <div class="content">
                                            <a href="{{route('column.show', $column->id)}}"
                                               style="text-decoration:none;">
                                                <div class="row">
                                                    {{--Right--}}
                                                    <div class="col-md-3 col-md-push-9">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-6 col-xs-12"></div>
                                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                                <div class="status"><h4>インタビュー</h4></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--Left--}}
                                                    <div class="col-md-9 col-md-pull-3">
                                                        <div class="title"><h4>{{$column->title}}</h4></div>
                                                    </div>
                                                </div>

                                                <div class="category" style="color: #636B6F; font-weight: bold">
                                                    <p>{{$column->category_name}}</p></div>
                                                <div class="date col-md-12" style="text-align: right">
                                                    <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">{{ $columns->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript-add')
    @parent
    <script>
        $(function () {
            $('.favorite').click(function () {
                var user_id = $(this).find('.user_id').val();
                var column_id = $(this).find('.column_id').val();
                var favorite = $(this).find('.fa-heart-o');
                if (user_id) {
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
                        favorite.css('disabled', true);
                    });
                }
                else {
                    // Chưa login
                }
            });
        })
    </script>
@endsection