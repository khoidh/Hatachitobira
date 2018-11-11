@extends('admin.home')

@section('css')
    @parent
@endsection
@section('javascrip')
    <script src= "{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };
    </script>
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('コラム')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('columns.index') }}">{{__('コラム一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('ビュー')}} </li>
                </ol>
            </div>
        </div>
    </div>
    
@endsection
@section('content-title','コラム情報')
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
            <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">{{__('カテゴリ')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$column->category_name}}" disabled="">
        </div>
    </div>

    <div class="form-group row">
        <label for="title"  class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $column->title }}" disabled="">
        </div>
    </div>
        <div class="form-group row">
        <label for="description"  class="col-sm-2 col-form-label">{{__('説明')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $column->description }}" disabled="" >
        </div>
    </div>
    <div class="form-group row">
        <label for="ckeditor-text" class="col-sm-2 col-form-label">{{__('コンテンツ')}}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" disabled="">{{ $column->content }}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor-text', options);
        </script>
    </div>

    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">{{__('イメージ')}}</label>
        <div class="col-sm-10">
            <img src="<?php echo asset('images/admin/column/'.$column->image) ?>" id="temp_img" width="150px" height="150px">
        </div>
    </div>

     <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" value="{{ $column->sort }}" disabled="">
        </div>
    </div>

                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">{{__('タイプ')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php if($column->type == 1) echo 'コラム';else echo 'インタビュー'  ?>" disabled="">

                    </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-10">
                    <a class="btn btn-info" href="{{route('columns.index')}}">一覧に戻る </a>

                </div>
                <form action="{{route('columns.destroy', $column->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" name="" value="削除する"
                           onclick="return confirm('削除する、よろしいでしょうか')">
                </form>
            </div>
        </div>
    </div>

@endsection

