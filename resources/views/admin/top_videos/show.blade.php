@extends('admin.home')
@section('content-header')
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('トップ動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('トップ動画一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('ビュー')}}</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','トップ動画')
@section('card-content')
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
            <form action="{{route('topvideos.update',$top_video->id)}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT')}}

                <div class="form-group row">
                    <label for="video_type_id" class="col-sm-2 col-form-label">{{__('動画タイプ')}}</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="{{$top_video->type}}" disabled="">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="タイトル"  
                               value="{{$top_video->title}}" disabled="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="youtube_url" class="col-sm-2 col-form-label">{{__('YoutubeURL')}}</label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="YoutubeURL"  
                               value="{{$top_video->youtube_url}}" disabled="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">{{__('サムネイル')}}</label>
                    <div class="col-sm-10">
                        <img src="<?php echo asset('images/admin/top_videos/'.$top_video->thumbnail) ?>" id="temp_img" width="150px" height="150px">
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                        <a class="btn btn-info" href="{{route('topvideos.index')}}">一覧に戻る</a>

                  </div>
                  <form action="{{route('topvideos.destroy', $top_video->id)}}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="delete">
                          <input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">
                  </form>
                </div>
            </form>
        </div>
    </div>

@endsection
