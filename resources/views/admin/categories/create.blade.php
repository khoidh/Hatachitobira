@extends('admin.home')
@section('content-header')
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('カテゴリ')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('カテゴリ一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('追加')}}</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','カテゴリ情報')
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
            <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{__('お名前')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"  autofocus=""
                               value="{{old('name')}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">{{__('説明')}}</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description" id="ckeditor-text" >{{old('description')}}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label" >Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"  autofocus=""
                               value="{{old('slug')}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">{{__('アイコン')}}</label>
                    <div class="col-sm-10">
                        <img src="{{asset('images/admin/default.png')}}" id="temp_img" width="150px" height="150px">
                        <input type="file" name="image" id="image"  accept="image/*" id="upload"  >
                        <input type="hidden" name="icon" id="icon" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="sort" id="sort"  placeholder="Sort" value="{{old('sort')}}">
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
                $('#icon').val(file.name);
            };
            reader.readAsDataURL(file);
        });

    });
</script>
@endsection