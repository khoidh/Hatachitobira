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
                    <li class="breadcrumb-item active">{{__('追加')}}</li>
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
    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };
    </script>
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
<form  action="{{route('events.store')}}" enctype="multipart/form-data" method="POST">
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
        <label for="ckeditor-text" class="col-sm-2 col-form-label">{{__('コンテンツ')}}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" autofocus="">{{old('content')}}</textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor-text', options);
        </script>
    </div>

    <div class="form-group row">
        <label for="file" class="col-sm-2 col-form-label">{{__('イメージ')}}</label>
        <div class="col-sm-10">
            <img src="{{asset('images/admin/default.png')}}" id="temp_img" width="150px" height="150px">
            <input type="file" name="image_selected"  accept="image/*" id="file"  >
            <input type="hidden" name="image" id="image" value="">
        </div>
    </div>

     <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="sort" placeholder="Sort" value="{{ old('sort') }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="time_from" class="col-sm-2 col-form-label">{{__('表示期間')}}</label>
        <div class="col-sm-10" style="padding: 0">
            <div class="row">
                <div class="col-sm-6">
                    <label for="time_from" class="col-sm-12 col-form-label">{{__('開始')}}</label>
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="time_from" id="time_from" value="{{old('time_from')}}">
                    </div>
                </div>
                <div class="col-sm-6" >
                    <label for="time_to" class="col-sm-12 col-form-label">{{__('終了')}}</label>
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="time_to" id="time_to" value="{{old('time_to')}}">
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
                                <input type="datetime-local" class="form-control" name="started_at" id="started_at" value="{{old('started_at')}}">
                    </div>
                </div>
                <div class="col-sm-6" >
                    <div class="col-sm-12">
                                <input type="datetime-local" class="form-control" name="closed_at" id="closed_at" value="{{old('closed_at')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label" >{{__('場所')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="address" placeholder="{{__('場所')}}"
                   value="{{old('address')}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="overview" class="col-sm-2 col-form-label">{{__('概要')}}</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="overview" id="overview" placeholder="{{__('概要')}}" rows="4">{{old('overview')}}</textarea>
        </div>
    </div>

    <div class="form-group has-icon row">
        <label for="entry_fee" class="col-sm-2 col-form-label">{{__('参加費')}}</label>
        <div class="col-sm-10">
            <div class="input-group">
              <input type="number" class="form-control" name="entry_fee" id="entry_fee" placeholder="{{__('参加費（￥）')}}" value="{{old('entry_fee')}}"> 
              <span class="input-group-addon">￥</span>
            </div>
        </div>
    </div>

    <div class="form-group has-icon row">
        <label for="capacity" class="col-sm-2 col-form-label">{{__('定員')}}</label>
        <div class="col-sm-10">
            <div class="input-group">
              <input type="number" class="form-control" name="capacity" id="capacity" placeholder="{{__('定員')}}" value="{{old('capacity')}}">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">{{__('登録')}}</button>
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