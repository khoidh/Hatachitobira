@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin_plugin/css/column.css')}}">
    <style>
        #file {
            display: none;
        }

        .file-Select {
            max-width: 125px;
            max-height: 125px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            line-height: 10px;
            padding: 4px;
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
            padding: .4em;
            margin: .2em;
            height: 30px;
        }
    </style>
@endsection
@section('javascrip')
    <script src="{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
@endsection
@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('columns.index') }}">Columns</a></li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1"
                    type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="ft-settings icon-left"></i> Action
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('columns.create')}}"><i class="la la-plus"></i> Add New</a>
                <a class="dropdown-item" href="{{route('columns.edit',$column->id)}}"><i
                            class="la la-pencil-square"></i> Edit</a>
                <a class="dropdown-item" href="#"><i class="la la-times"></i> Cancel</a>
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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputState">Category</label>
                <div class="col-sm-10">
                    <input id="category" value="{{$column->category_name}}" class="form-control" disabled="">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="{{$column->title}}" disabled="">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" value="{{$column->description}}"
                           placeholder="Description" required="true" maxlength="256" disabled="">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" disabled="">
                        {!! $column->content !!}
                    </textarea>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace('ckeditor-text');
                </script>
            </div>

            {{--Image--}}
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-10">
                    <div>
                        @php $image='image/column/'.$column->image; @endphp
                        <img class="file-Select"
                             src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">
                        <input class="file-edited-check" type="hidden" name="image_edited_check" value=false>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sort" value="{{$column->sort}}" disabled="">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-10">
                    <select type="number" name="type" class="form-control" value="{{$column->type}}" disabled="">
                        <option value='0' {{($column->type==0) ? 'selected' : ''}}>インタビュー</option>
                        <option value='1' {{($column->type==1) ? 'selected' : ''}}>コラム</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <a class="btn btn-info" href="{{route('columns.index')}}">一覧に戻る </a>

                </div>
                <form action="{{route('columns.destroy', $column->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn btn-danger" type="submit" name="" value="削除する"
                           onclick="return confirm('削除する、よろしいでしょうか')">
                </form>
            </div>
        </div>
    </div>

@endsection