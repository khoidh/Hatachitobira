@extends('admin.home')

@section('css')
    @parent
    <style>
        #file {
            display: none;
        }

        .file-Select {
            max-width: 125px;
            max-height: 125px;
            margin-top: 10px;
            /*border: 1px solid #ddd;*/
            /*border-radius: 4px;*/
            /*line-height: 10px;*/
            /*padding: 4px;*/
        }

        /* this code is not required */
        .btn.btn-default.btn-upload {
            position: relative;
            z-index: 1;
            border: 1px solid #ddd;
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;
            line-height: 16px;
            padding: .4em ;
            margin: .2em;
            height: 30px;
        }
    </style>
@endsection
@section('javascrip')
    <script src= "{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        $(document).ready(function () {
            //this code is not required
            $('#file').change(function(){
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        selectedImage = e.target.result;
                        $('.file-Select').attr('src', selectedImage);
                        $('.file-Select').attr('style','border: 1px solid #ddd; border-radius: 4px; line-height: 10px; padding: 4px');
                    };
                    reader.readAsDataURL(this.files[0]);
                    $('.file-edited-check').val(true);
                }
            });
        })
    </script>
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('columns.index') }}">Columns</a></li>
                    <li class="breadcrumb-item active">Add new </li>
                </ol>
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
            <form action="{{route('columns.store')}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="inputState">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control" required="true">
                            {{--<option selected>Choose Category</option>--}}
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="" placeholder="Title" required="true" maxlength="256">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" value="" placeholder="Description" required="true" maxlength="256">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3"  class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" required="true"></textarea>
                    </div>
                    <script type="text/javascript">
                        CKEDITOR.replace('ckeditor-text' );
                    </script>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-10">
                        <div class="upload-actions">
                            <label class="btn btn-default btn-upload" for="file" required="true"><i class="fa fa-upload"></i> Choose file</label>
                            <input type="file" id="file" accept="image/*" name="image">
                        </div>
                        <div>
                            <img class="file-Select">
                            <input class="file-edited-check" type="hidden" name="image_edited_check" value=false>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="sort"
                               min="1" max="2147483647"
                               onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                               required="true">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select type="number" name="type" id="type" class="form-control" tabindex=1>
                            <option value='0' selected>インタビュー</option>
                            <option value='1'>コラム</option>
                        </select>
                        {{--<input type="number" class="form-control" name="type" required="true">--}}
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