@extends('admin.home')
@section('javascrip')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form method="POST"  action="{{route('columns.store')}}">
        {{ csrf_field() }}
        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="inputState">Category</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control">
                    <option selected>Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="" placeholder="Title">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" placeholder="Description" id="ckeditor-text"></textarea>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('ckeditor-text' );
            </script>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-10">
                <input type="file" name="image">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </div>
    </form>
@endsection