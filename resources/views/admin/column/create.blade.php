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
                    <li class="breadcrumb-item active">{{__('追加')}} </li>
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
            <form action="{{route('columns.store')}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">{{__('カテゴリ')}}</label>
        <div class="col-sm-10">
            <select name="category_id" id="category_id" class="form-control">
                {{--<option selected>Choose Category</option>--}}
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="title"  class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Title" >
        </div>
    </div>
        <div class="form-group row">
        <label for="description"  class="col-sm-2 col-form-label">{{__('説明')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" placeholder="Description" >
        </div>
    </div>
    <div class="form-group row">
        <label for="ckeditor-text" class="col-sm-2 col-form-label">{{__('コンテンツ')}}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" >{{old('content')}}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor-text', options);
        </script>
    </div>

    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">{{__('イメージ')}}</label>
        <div class="col-sm-10">
            <img src="{{asset('images/admin/default.png')}}" id="temp_img" width="150px" height="150px">
            <input type="file" name="image_selected"  accept="image/*" id="file" >
            <input type="hidden" name="image" id="image" value="">
        </div>
    </div>

     <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="sort" placeholder="Sort" value="{{ old('sort') }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">{{__('タイプ')}}</label>
        <div class="col-sm-10">
            <select type="number" name="type" id="type" class="form-control" tabindex=1>
                <option value='0' selected>インタビュー</option>
                <option value='1'>コラム</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="display" class="col-sm-2 col-form-label">{{__('表示')}}</label>
        <div class="col-sm-10">
            <select class="form-control" name="display" id="display">
                <option value="1" <?php if(old('display') == 1) echo 'selected' ?>>表示</option>
                <option value="0" <?php if(old('display') == 0) echo 'selected' ?>>非表示</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </div>
            </form>
        </div>
    </div>

@endsection

@section('customjavascript')
<script type="text/javascript">
    $(function(){
        $('input[type="file"]').change(function(e){
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = (e) => {
                selectedImage = e.target.result;
                $('#temp_img').attr('src', selectedImage);
                $('#image').val(file.name);
            };
            reader.readAsDataURL(file);
        });

    });
</script>
@endsection