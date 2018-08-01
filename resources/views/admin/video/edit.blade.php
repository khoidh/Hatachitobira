@extends('admin.home')

@section('content')
    <form action="{{route('events.update',$event->id)}}" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" value="{{$event->title}}" placeholder="Title">
            </div>
        </div>

        <div class="form-group row">

            <label class="col-sm-2 col-form-label" for="inputState">Category</label>
            <div class="col-sm-10">
                <select name="category" value="{{$event->category_id}}" class="form-control">
                    <option selected>Choose Category</option>
                    <option value="1">Category1</option>
                    <option value="2">Category2</option>
                    <option value="3">Category3</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" value="{{$event->image}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
            <div class="col-sm-10">
                <input type="number" name="sort" value="{{$event->sort}}">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Start at </label>
            <div class="col-sm-10">
                <input type="date" name="time_from" value="{{$event->time_from}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">End at </label>
            <div class="col-sm-10">
                <input type="date" name="time_to" value="{{$event->time_to}}">
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