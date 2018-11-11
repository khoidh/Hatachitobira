@extends('admin.home')

@section('css')
    @parent
    
@endsection
@section('content-header')

<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('イベント')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">{{__('イベント一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('ビュー')}}</li>
                </ol>
            </div>
        </div>
    </div>
    
@endsection
@section('content-title','イベント情報')
@section('card-content')
@endsection
@section('javascrip')
    <script src= "{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-md-center">
        <div class="col-md-10">
    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">{{__('カテゴリ')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$event->category_name}}" disabled="" >
        </div>
    </div>

    <div class="form-group row">
        <label for="title"  class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$event->title}}" disabled="">
        </div>
    </div>
    <div class="form-group row">
        <label for="ckeditor-text" class="col-sm-2 col-form-label">{{__('コンテンツ')}}</label>
        <div class="col-sm-10">
            <textarea class="form-control"  id="ckeditor-text" disabled="" >{{$event->content}}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor-text' );
        </script>
    </div>

    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">{{__('イメージ')}}</label>
        <div class="col-sm-10">
            <img src="<?php echo asset('images/admin/event/'.$event->image) ?>" width="150px" height="150px">
        </div>
    </div>

     <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" class="form-control"  value="{{$event->sort}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <label for="time_from" class="col-sm-2 col-form-label">{{__('表示期間')}}</label>
        <div class="col-sm-10" style="padding: 0">
            <div class="row">
                <div class="col-sm-6">
                    <label for="time_from" class="col-sm-12 col-form-label">{{__('開始')}}</label>
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="time_from" id="time_from" 
                                value="<?php echo date('Y-m-d\TH:i:s', strtotime($event->time_from)); ?>" disabled="">
                    </div>
                </div>
                <div class="col-sm-6" >
                    <label for="time_to" class="col-sm-12 col-form-label">{{__('終了')}}</label>
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="time_to" id="time_to" 
                                value="<?php echo date('Y-m-d\TH:i:s', strtotime($event->time_to)); ?>" disabled="">
                    </div>
                </div>
                
            </div>
        </div>

    </div>

    <div class="form-group row">
        <label  for="started_at" class="col-sm-2 col-form-label">{{__('日程')}}</label>
        <div class="col-sm-10" style="padding: 0">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="started_at" id="started_at" 
                                value="<?php echo date('Y-m-d\TH:i:s', strtotime($event->started_at)); ?>" disabled="">
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="closed_at" id="closed_at" 
                                value="<?php echo date('Y-m-d\TH:i:s', strtotime($event->closed_at)); ?>" disabled="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label" >{{__('場所')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="address" placeholder="{{__('場所')}}"
                   value="{{$event->address}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <label for="overview" class="col-sm-2 col-form-label">{{__('概要')}}</label>
        <div class="col-sm-10">
            <textarea type="text" class="form-control" name="overview" id="overview" placeholder="{{__('概要')}}" cols="50" rows="4"
                  disabled="" >{{$event->overview}}
               </textarea>
        </div>
    </div>

    <div class="form-group has-icon row">
        <label for="entry_fee" class="col-sm-2 col-form-label">{{__('参加費')}}</label>
        <div class="col-sm-10">
            <div class="input-group">
              <input type="number" class="form-control" name="entry_fee" id="entry_fee" placeholder="{{__('参加費')}}" 
                    value="{{$event->entry_fee}}" disabled=""> 
              <span class="input-group-addon"><i class="fa fa-jpy"></i></span>
            </div>
        </div>
    </div>

    <div class="form-group has-icon row">
        <label for="capacity" class="col-sm-2 col-form-label">{{__('定員')}}</label>
        <div class="col-sm-10">
            <div class="input-group">
              <input type="number" class="form-control" name="capacity" id="capacity" placeholder="{{__('定員')}}" 
                        value="{{$event->capacity}}" disabled="">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
            </div>
        </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-10">
          <a class="btn btn-info" href="{{route('events.index')}}">一覧に戻る</a>

    </div>
    <form action="{{route('events.destroy', $event->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">
                    </form>
  </div>
        </div>
    </div>
    @endsection
