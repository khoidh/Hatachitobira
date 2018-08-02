@extends('admin.home')
@section('content')
    <form action="{{route('videos.update',$video->id)}}" method="post">
        {{ csrf_field() }}

        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="inputState">Category</label>
            <div class="col-sm-10">

                <select name="category_id" value="<?php echo $video->id ?>" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{($category->id == $video->category_id) ? 'selected' : ''}} >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
                <input type="text" name="url" id="url" value="{{$video->url}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" name="description" id="description" value="{{$video->description}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" id="image" value="{{$video->image}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="sort" class="col-sm-2 col-form-label">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort" id="sort" value="{{$video->sort}}">
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