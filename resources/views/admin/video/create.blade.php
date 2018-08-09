@extends('admin.home')

@section('content')
<form method="POST"  action="{{route('videos.store')}}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="" placeholder="Title">
        </div>
    </div>

    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">Category</label>
        <div class="col-sm-10">
        <select name="category_id" id="category_id" class="form-control">
            <option selected>Choose Category</option>
            @foreach($categories as $category)
                <option value="<?php  echo $category->id ?>"><?php  echo $category->name ?></option>
            @endforeach
        </select>
        </div>
    </div>

     <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label">URL</label>
        <div class="col-sm-10">
            <input type="text" name="url" id="url">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" name="description" id="description">
        </div>
    </div>
    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" id="image">
        </div>
    </div>
    <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" name="sort" id="sort">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </div>
</form>
    @endsection