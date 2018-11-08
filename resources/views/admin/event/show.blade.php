@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin/css/event.css')}}">
    <style>
        #file {
            display: none;
        }

        .file-Select {
            max-width: 125px;
            max-height: 125px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            line-height: 10px;
            padding: 4px;
        }

        /* this code is not required */
        .btn.btn-default.btn-upload {
            position: relative;
            z-index: 1;
            border: 1px solid #ddd;
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;
            line-height: 16px;
            padding: .4em ;
            margin: .2em;
            height: 30px;
        }

        .has-icon .form-control {
            padding-left: 2.375rem;
        }

        .has-icon .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            /*height: 2.375rem;*/
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;

            /*color: #4d4d4d;*/
            height: 100%;
            font-size: 18px;
            display: flex;
            align-items: center;
            left: 25px;
        }
    </style>
@endsection
@section('javascrip')
    <script src= "{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
@endsection
@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Events</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Show </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('events.create')}}"><i class="la la-plus"></i>   Add New</a>
                <a class="dropdown-item" href="{{route('events.edit',$event->id)}}"><i class="la la-pencil-square"></i>   Edit</a>
                <a class="dropdown-item" href="#"><i class="la la-times"></i>   Cancel</a>
            </div>
        </div>
    </div>
@endsection
@section('content-title','Events')
@section('card-content')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="inputState">Category</label>
                    <div class="col-sm-10">
                        <input id="category" value="{{$event->category_name}}" class="form-control" disabled="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$event->title}}" disabled="">
                    </div>
                </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" disabled="">
                        {!! $event->content !!}
                    </textarea>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace('ckeditor-text');
                </script>
            </div>

                {{--Image--}}
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-10">
                        <div>
                            @php $image='image/event/'.$event->image; @endphp
                            <img class="file-Select" src="{{file_exists($image)?asset($image): asset('image/event/event_default.jpg')}}">
                            <input class="file-edited-check" type="hidden" name="image_edited_check" value=false>
                        </div>
                    </div>
                </div>

                {{--Sort--}}
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="sort" value="{{$event->sort}}" disabled="">
                    </div>
                </div>

                {{--Thời gian đăng ký--}}
                <div class="form-group row">
                    <label for="time_from" class="col-sm-2 col-form-label">登録時間</label>
                    <div class="col-sm-10" style="padding: 0">
                        <div class="row">
                            {{--time_from--}}
                            <div class="col-sm-6">
                                <label for="time_from" class="col-sm-12 col-form-label">Start at </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="time_from_date"
                                                   value="<?php echo date('Y-m-d', strtotime($event->time_from));?>" disabled="">
                                        </div>
                                        <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                            <input type="time" class="form-control" name="time_from_time" value="<?php echo date('H:i:s', strtotime($event->time_from)); ?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--time_to--}}
                            <div class="col-sm-6" style="padding-left: 0;
    padding-right: 30px;">
                                <label for="time_to" class="col-sm-12 col-form-label">End at </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="time_to_date"
                                                   value="<?php echo date('Y-m-d', strtotime($event->time_to));?>" disabled="">
                                        </div>
                                        <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                            <input type="time" class="form-control" name="time_to_time" value="<?php echo date('H:i:s', strtotime($event->time_to));?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{--End thời gian đăng ký--}}

                {{--Thời gian diễn ra event--}}
                <div class="form-group row">
                    <lable  for="started_at" class="col-sm-2 col-form-lable">日程</lable>
                    <div class="col-sm-10" style="padding: 0">
                        <div class="row">
                            {{--Start hour--}}
                            <div class="col-sm-6">
                                <label for="started_at" class="col-sm-12 col-form-label">Start at </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="started_at_date"
                                                   value="<?php echo date('Y-m-d', strtotime($event->started_at));?>" disabled="">
                                        </div>
                                        <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                            <input type="time" class="form-control" name="started_at_time" value="<?php echo date('H:i:s', strtotime($event->started_at)); ?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--Close hour--}}
                            <div class="col-sm-6" style="padding-left: 0;
    padding-right: 30px;">
                                <label for="closed_at" class="col-sm-12 col-form-label">Start at </label>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" name="closed_at_date"
                                                   value="<?php echo date('Y-m-d', strtotime($event->closed_at));?>" disabled="">
                                        </div>
                                        <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                            <input type="time" class="form-control" name="closed_at_time" value="<?php echo date('H:i:s', strtotime($event->closed_at)); ?>" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--End thời gian diễn ra event--}}

                {{--Địa điểm--}}
                <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">場所</lable>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="{{$event->address}}" disabled="">
                    </div>
                </div>

                {{--Tóm tắt--}}
                <div class="form-group row">
                    <lable class="col-sm-2 col-form-lable">概要</lable>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="overview" value="{{$event->overview}}" disabled="">
                    </div>
                </div>

                {{--Phí tham gia--}}
                <div class="form-group has-icon row">
                    <lable class="col-sm-2 col-form-lable">参加費</lable>
                    <div class="col-sm-10">
                        <span class="fa fa-jpy form-control-feedback" ></span>
                        <input type="number" class="form-control" name="entry_fee" value="{{$event->entry_fee}}" disabled="">
                    </div>
                </div>

                {{--Sức chứa--}}
                <div class="form-group has-icon row">
                    <lable class="col-sm-2 col-form-lable">定員</lable>
                    <div class="col-sm-10">
                        <span class="fa fa-users form-control-feedback" ></span>
                        <input type="number" class="form-control" name="capacity" value="{{$event->capacity}}" disabled="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a class="btn btn-info" href="{{route('events.index')}}">一覧に戻る </a>

                    </div>
                    <form action="{{route('events.destroy', $event->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する"
                               onclick="return confirm('削除する、よろしいでしょうか')">
                    </form>
                </div>
        </div>
    </div>

    {{--<div class="table-responsive">--}}
        {{--<table class="table mb-0">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th class="id">ID</th>--}}
            {{--<th class="title">Title</th>--}}
            {{--<th class="image">Image</th>--}}
            {{--<th class="category">Category</th>--}}
            {{--<th class="sort">Sort</th>--}}
            {{--<th class="startAt">Start At</th>--}}
            {{--<th class="endAt">End At</th>--}}
            {{--<th class="delete">Delete</th>--}}

        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
            {{--<tr>--}}
                {{--{{dd($event)}}--}}
                {{--<th scope="row">{{$event->id}}</th>--}}
                {{--<td>{{$event->title}}</td>--}}

                {{--<td>{{$event->image}}</td>--}}
                {{--@php $image= 'image/event/'.$event->image @endphp--}}
                {{--<td><img width="100px" height="100px"--}}
                         {{--src="{{ file_exists($image)?asset($image):asset('image/event/event_default.jpg')}}" ></td>--}}

                {{--<td>{{$event->category_name}}</td>--}}
                {{--<td>{{$event->sort}}</td>--}}
                {{--<td>{{$event->time_from}}</td>--}}
                {{--<td>{{$event->time_to}}</td>--}}
                {{--<td><form action="{{route('events.destroy', $event->id)}}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input type="hidden" name="_method" value="delete">--}}
                        {{--<input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">--}}
                    {{--</form></td>--}}
            {{--</tr>--}}


        {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<a class="btn btn-info" href="{{route('events.index')}}">一覧に戻る</a>--}}

@endsection