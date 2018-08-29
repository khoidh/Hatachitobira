@extends('admin.home')

@section('css')
    @parent
    <style>
        #selectedFiles img {
            max-width: 125px;
            max-height: 125px;
            float: left;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('javascrip')
    <script src= "/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        var selDiv = "";

        document.addEventListener("DOMContentLoaded", init, false);
        function init() {
            document.querySelector('#image').addEventListener('change', handleFileSelect, false);
            selDiv = document.querySelector("#selectedFiles");
        }

        function handleFileSelect(e) {

            // debugger;
            if(!e.target.files || !window.FileReader) return;

            selDiv.innerHTML = "";

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f) {
                var f = files[i];
                if(!f.type.match("image.*")) {
                    return;
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    // var html = "<img src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
                    var html = "<img src=\"" + e.target.result + "\">" + "<br clear=\"left\"/>";
                    selDiv.innerHTML += html;
                }
                reader.readAsDataURL(f);
            });

        }
    </script>
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Columns</a></li>
                    <li class="breadcrumb-item active"> Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#"><i class="la la-save"></i>   登録</a>
                <a class="dropdown-item" href="#"><i class="la la-times"></i>   Cancel</a>
            </div>
        </div>
    </div>
@endsection
@section('content-title','Columns')
@section('card-content')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <form action="{{route('columns.update',$column->id)}}"  enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputState">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" value="<?php echo $column->id ?>" class="form-control" required="true">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{($category->id == $column->category_id) ? 'selected' : ''}} >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="{{$column->title}}" placeholder="Title" required="true">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" value="{{$column->description}}" placeholder="Description" required="true">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" required="true">
                        {{$column->content}}
                    </textarea>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace('ckeditor-text' );
                </script>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-10">
                    {{--<input type="file" name="image" value="{{$column->image}}" required="true" image="jpeg, png, bmp, gif, or svg">--}}
                    <input type="file" id="image" name="image" required="true" image="jpeg, png, bmp, gif, or svg" ><br/>

                    <div id="selectedFiles" style="margin-top: 10px"></div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
                <div class="col-sm-10">
                    <input type="number" name="sort" value="{{$column->sort}}" required="true">
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