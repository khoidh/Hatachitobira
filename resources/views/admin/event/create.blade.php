@extends('admin.home')

@section('content-header')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Events</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Add new </li>
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
@section('content-title','Events')
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
<form  action="{{route('events.store')}}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="inputState">Category</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                {{--<option selected>Choose Category</option>--}}
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3"  class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required="true">
        </div>
    </div>


    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" value="{{ old('image') }}" required="true">
        </div>
    </div>
     <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" name="sort" value="{{ old('sort') }}" required="true">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Start at </label>
        <div class="col-sm-10">
            <input type="datetime-local" name="time_from" value="{{ old('time_from') }}" required="true">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">End at </label>
        <div class="col-sm-10">
            <input type="datetime-local" name="time_to" value="{{ old('time_to') }}" required="true">
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