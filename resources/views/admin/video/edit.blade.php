@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Videos</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">videos</a></li>
                    <li class="breadcrumb-item active"> Edit</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','Videos')
@section('card-content')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
    <form action="{{route('videos.update',$video->id)}}"  enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="inputState">Category</label>
            <div class="col-sm-10">

                <select name="category_id" value="<?php echo $video->id ?>" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{($category->id == $video->category_id) ? 'selected' : ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="url" id="url" value="{{$video->url}}" required="true">
            </div>
        </div>

        <div class="form-group row">
            <label for="sort" class="col-sm-2 col-form-label">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort" class="form-control" id="sort" value="{{$video->sort}}" required="true" min="1">
            </div>
        </div>
        <div class="form-group row">
            <label for="sort" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <select type="number" name="type" class="form-control"  value="{{$video->type}}" tabindex=1>
                    <option value='0' {{($video->type==0) ? 'selected' : ''}}>ジョブシャドウ</option>
                    <option value='1' {{($video->type==1) ? 'selected' : ''}}>ロールプレイ</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" name="_method" value="patch">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
            
        </div>

    </form>
    </div>
    </div>
@endsection