@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin/css/video.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Videos</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                    <li class="breadcrumb-item active">Show </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('videos.create')}}"><i class="la la-plus"></i>   Add New</a>
                <a class="dropdown-item" href="{{route('videos.edit',$video->id)}}"><i class="la la-pencil-square"></i>   Edit</a>
            </div>
        </div>
    </div>
@endsection
@section('content-title','Videos')
@section('card-content')
@endsection
@section('content')

  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input id="id" value="{{$video->id}}" class="form-control" disabled="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
      <input id="category" value="{{$video->category_name}}" class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="Title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input id="Title" value="{{$video->title}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="Thumbnails" class="col-sm-2 col-form-label">Thumbnails</label>
    <div class="col-sm-10">
      <img src="{{$video->thumbnails}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="EmbedHtml" class="col-sm-2 col-form-label">EmbedHtml</label>
    <div class="col-sm-10">
      <input id="EmbedHtml" value="{{$video->embedHtml}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="ViewCount" class="col-sm-2 col-form-label">ViewCount</label>
    <div class="col-sm-10">
      <input id="ViewCount" value="{{$video->viewCount}}"class="form-control" disabled="">
    </div>
  </div>
    <div class="form-group row">
    <label for="PublishedAt" class="col-sm-2 col-form-label">PublishedAt</label>
    <div class="col-sm-10">
      <input id="PublishedAt" value="{{$video->publishedAt}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="Sort" class="col-sm-2 col-form-label">Sort</label>
    <div class="col-sm-10">
      <input id="Sort" value="{{$video->sort}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="Type" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
      <input id="Type" value="<?php echo ($video->type==0)?'ジョブシャドウ':'ロールプレイ' ?>"class="form-control" disabled="">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
          <a class="btn btn-info" href="{{route('videos.index')}}">一覧に戻る</a>

    </div>
    <form action="{{route('videos.destroy', $video->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">
                    </form>
  </div>
@endsection