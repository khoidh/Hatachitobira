@extends('admin.home')
@section('javascrip')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="{{route('columns.update',$column->id)}}" method="post">
        {{ csrf_field() }}
		
        <div class="form-group row">		
            <label class="col-sm-2 col-form-label" for="inputState">Category</label>
            <div class="col-sm-10">
                <select name="category_id" value="<?php echo $column->id ?>" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{($category->id == $column->category_id) ? 'selected' : ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
		
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{$column->title}}" placeholder="Title">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="description" value="{{$column->description}}" placeholder="Description">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text">
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
                <input type="file" name="image" value="{{$column->image}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort" value="{{$column->sort}}">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="hidden" name="_method" value="patch">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </div>
    </form>
@endsection