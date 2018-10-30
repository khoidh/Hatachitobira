@extends('admin.home')
@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Categories</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category list</a></li>
                    <li class="breadcrumb-item active"> Edit</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','Categories')
@section('card-content')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <form action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label"  >Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="true" autofocus="" value="{{$category->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" placeholder="Description" id="ckeditor-text" required="true"  value="">{{$category->description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="slug" id="slug" value="{{$category->slug}}" placeholder="Slug" required="true">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <img src="<?php echo asset('image/category/'.$category->icon) ?>" id="temp_img" width="150px" height="150px">
                        <input type="file" name="image" id="image"  accept="image/*" id="upload" <?php if(!$category->icon) echo 'required'?> >
                        <input type="hidden" name="icon" value="{{$category->icon}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sort" id="sort" value="{{$category->sort}}" placeholder="Sort" required="true">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="display" class="col-sm-2 col-form-label">Display</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="display" id="display">
                            <option value="1" <?php if($category->display == 1) echo 'selected' ?> >表示</option>
                            <option value="0"<?php if($category->display == 0) echo 'selected' ?> >非表示</option>
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
            };
            reader.readAsDataURL(file);
        });

    });
</script>
@endsection