@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">{{__('一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('編集')}}</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','動画情報')
@section('card-content')
@endsection
@section('content')
        @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
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
    <form action="{{route('videos.update',$video->id)}}"  enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}

        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="category_id">{{__('カテゴリ')}}</label>
            <div class="col-sm-10">

                <select name="category_id" id="category_id" value="<?php echo $video->id ?>" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{($category->id == $video->category_id) ? 'selected' : ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">{{__('URL')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="url" id="url" value="{{$video->url}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
            <div class="col-sm-10">
                <input type="number" name="sort" class="form-control" id="sort" value="{{$video->sort}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">{{__('タイプ')}}</label>
            <div class="col-sm-10">
                <select type="number" name="type" id="type" class="form-control"  value="{{$video->type}}" tabindex=1>
                    <option value='0' {{($video->type==0) ? 'selected' : ''}}>ジョブシャドウ</option>
                    <option value='1' {{($video->type==1) ? 'selected' : ''}}>ロールプレイ</option>
                    <option value='2' {{($video->type==2) ? 'selected' : ''}}>コンセプトムービー</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="display" class="col-sm-2 col-form-label">{{__('表示')}}</label>
            <div class="col-sm-10">
                <select class="form-control" name="display" id="display">
                    <option value="1" <?php if($video->display == 1) echo 'selected' ?> >表示</option>
                    <option value="0"<?php if($video->display == 0) echo 'selected' ?> >非表示</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" name="_method" value="patch">
                <button type="submit" class="btn btn-primary">{{__('更新')}}</button>
            </div>
            
        </div>

    </form>
    </div>
    </div>
@endsection