@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Videos</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
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
@section('content-title','Videos')
@section('card-content')
@endsection
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-10">
<form action="{{route('videos.store')}}"  enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="" placeholder="Title" required="true">
        </div>
    </div>

    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">Category</label>
        <div class="col-sm-10">
        <select name="category_id" id="category_id" class="form-control" required ="true">
            {{--<option selected>Choose Category</option>--}}
            @foreach($categories as $category)
                <option value="<?php  echo $category->id ?>"><?php  echo $category->name ?></option>
            @endforeach
        </select>
        </div>
    </div>

     <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label">URL</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="url" id="url" value="" placeholder="URL" required="true">
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" id="description" value="" placeholder="Description" required="true">
        </div>
    </div>
    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
            <input type="file" name="image" id="image" required="true">
        </div>
    </div>
    <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="sort" required="true">
        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-10">
            <select type="number" name="type" id="type" class="form-control" tabindex=1>
                <option value='0' selected>ジョブシャドウ</option>
                <option value='1'>ロールプレイ</option>
            </select>
            {{--<input type="number" class="form-control" name="type" id="type" required="true">--}}
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