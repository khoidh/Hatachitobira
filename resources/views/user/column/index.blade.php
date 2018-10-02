@extends('layouts.app')

@section('css-add')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endsection
@section('title-e', 'Column')
@section('title-j', 'コラム')
@section('content')
    <div class="column row">
        <div class="article-list col-md-12">
            @foreach($columns as $column)
                <div class="article">
                    @php
                        $column_state="インタビュー";
                    @endphp
                    {{-- Làm mờ ảnh --}}
                    {{--                        <div class="article-status" style="background-image: url('{{asset('image/column/column-icon.png')}}'); opacity: 0.5; filter: alpha(opacity=50);">--}}
                    <div class="article-status"
                         style="background-image: url('{{asset('image/column/column-icon.png')}}');">
                        <p>{{$column_state}}</p>
                    </div>
                    <div class="article-content row">
                        <div class="content-left col-md-4">
                            <a href="{{route('column.show', $column->id)}}" style="text-decoration:none;">
                                @php $image='image/column/'.$column->image; @endphp
                                <img src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">
                            </a>
                        </div>
                        <div class="content-right col-md-8">
                            <div class="icon-favorite">
                                {{--==================== favorite ====================--}}
                                <i class="fa fa-heart-o" style="font-size:24px; color: #D4D4D4;"></i>
                                {{--@if(Auth::user())--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div type="submit" class="favorite">--}}
                                {{--<input type="hidden" class="favorite" value="0">--}}
                                {{--<input type="hidden" class="user_id"--}}
                                {{--value="{{Auth::user()->id}}">--}}
                                {{--<input type="hidden" class="column_id" value="{{$column->id}}">--}}
                                {{--<div class="col-md-12 text-right">--}}
                                {{--@if(in_array($column->id,$favorites_id))--}}
                                {{--<i class="fa fa-heart-o"--}}
                                {{--style="font-size:24px; color: red;"></i>--}}
                                {{--@else--}}
                                {{--<i class="fa fa-heart-o"--}}
                                {{--style="font-size:24px; color: blue;"></i>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--@else--}}
                                {{--<div type="submit">--}}
                                {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                {{--data-toggle="modal"--}}
                                {{--data-target="#modal_login"> </i>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                {{--==================== /end favorite ====================--}}
                            </div>
                            <div class="title">{{$column->title}}</div>
                            <div class="category" style="color: #636B6F; font-weight: bold">
                                <p>{{$column->category_name}}</p>
                            </div>
                            <div class="date" style="text-align: right">
                                <p>{{date('Y-m-d', strtotime($column->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <hr width="100%" size="30px" color="#DCDCDC" style="    padding-top: 1px;
    margin: 32px 0 8px;"/>
            <div class="paging text-center">{{ $columns->links() }}</div>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<h3>コラム</h3>--}}
        {{--<div class="container">--}}
            {{--<div class="column">--}}
                {{--<div class="row">--}}
                    {{--@foreach($columns as $column)--}}
                        {{--<div class="item">--}}
                            {{--<div class="wrapper">--}}
                                {{--<div class="row myStyle">--}}
                                    {{--Left--}}
                                    {{--<div class="col-md-2 col-sm-4 col-xs-12">--}}
                                        {{--<div class="content">--}}
                                            {{--<div class="icon">--}}
                                                {{--<a href="{{route('column.show', $column->id)}}">--}}
                                                    {{--@php $image='image/column/'.$column->image; @endphp--}}
                                                    {{--<img src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">--}}
                                                {{--</a>--}}

                                                {{--==================== favorite ====================--}}
                                                {{--@if(Auth::user())--}}
                                                    {{--{{ csrf_field() }}--}}
                                                    {{--<div type="submit" class="favorite">--}}
                                                        {{--<input type="hidden" class="favorite" value="0">--}}
                                                        {{--<input type="hidden" class="user_id"--}}
                                                               {{--value="{{Auth::user()->id}}">--}}
                                                        {{--<input type="hidden" class="column_id" value="{{$column->id}}">--}}
                                                        {{--<div class="col-md-12 text-right">--}}
                                                            {{--@if(in_array($column->id,$favorites_id))--}}
                                                                {{--<i class="fa fa-heart-o"--}}
                                                                   {{--style="font-size:24px; color: red;"></i>--}}
                                                            {{--@else--}}
                                                                {{--<i class="fa fa-heart-o"--}}
                                                                   {{--style="font-size:24px; color: blue;"></i>--}}
                                                            {{--@endif--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--@else--}}
                                                    {{--<div type="submit">--}}
                                                        {{--<i class="fa fa-heart-o" style="font-size:24px;"--}}
                                                           {{--data-toggle="modal"--}}
                                                           {{--data-target="#modal_login"> </i>--}}
                                                    {{--</div>--}}
                                                {{--@endif--}}
                                                {{--==================== /end favorite ====================--}}

                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}

                                    {{--Right--}}
                                    {{--<div class="col-md-10 col-sm-8 col-xs-12">--}}
                                        {{--<div class="content">--}}
                                            {{--<a href="{{route('column.show', $column->id)}}"--}}
                                               {{--style="text-decoration:none;">--}}
                                                {{--<div class="row">--}}
                                                    {{--Right--}}
                                                    {{--<div class="col-md-3 col-md-push-9">--}}
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-3 col-sm-6 col-xs-12"></div>--}}
                                                            {{--<div class="col-md-9 col-sm-6 col-xs-12">--}}
                                                                {{--<div class="status"><h4>インタビュー</h4></div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--Left--}}
                                                    {{--<div class="col-md-9 col-md-pull-3">--}}
                                                        {{--<div class="title"><h4>{{$column->title}}</h4></div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="category" style="color: #636B6F; font-weight: bold">--}}
                                                    {{--<p>{{$column->category_name}}</p></div>--}}
                                                {{--<div class="date col-md-12" style="text-align: right">--}}
                                                    {{--<p>{{date('Y-m-d', strtotime($column->created_at))}}</p>--}}
                                                {{--</div>--}}

                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                    {{--<div class="text-center">{{ $columns->links() }}</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('javascript-add')
    {{--@parent--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--$('.favorite').click(function () {--}}
                {{--var user_id = $(this).find('.user_id').val();--}}
                {{--var column_id = $(this).find('.column_id').val();--}}
                {{--var favorite = $(this).find('.fa-heart-o');--}}
                {{--if (user_id) {--}}
                    {{--// alert($favorites_id)--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: '{{route('column.favorite')}}', // This is what I have updated--}}
                        {{--data: {user_id: user_id, column_id: column_id},--}}
                        {{--//=========--}}
                        {{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}--}}
                    {{--}).done(function (msg) {--}}
                        {{--alert(msg);--}}
                        {{--favorite.css('color', 'red');--}}
                        {{--favorite.css('disabled', true);--}}
                    {{--});--}}
                {{--}--}}
                {{--else {--}}
                    {{--// Chưa login--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection