@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin/css/column.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">List Column</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('columns.create')}}"><i class="la la-plus"></i>   Add New</a>
                <a class="dropdown-item" href="#"><i class="la la-upload"></i>   Import</a>
            </div>
        </div>
    </div>
@endsection
@section('content-title','Columns')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th class="id">ID</th>
                <th class="title" >Title</th>
                <th class="description" >Description</th>
                <th class="image">Image</th>
                <th class="category" >Category</th>
                {{--<th class="sort" >Sort</th>--}}
                <th class="function"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($columns as $column)
                <tr>
                    <th scope="row" style="width: 100px;">{{$column->id}}</th>
                    <td>{{$column->title}}</td>
                    <td>{!!str_limit($column->description, $limit = 150, $end = '...')!!}</td>
                    <td><img width="100px" height="100px" src="{{asset('image/column/'.$column->image)}}" ></td>
                    <td>{{$column->category_name}}</td>
{{--                    <td>{{$column->sort}}</td>--}}
                    <td>
                        <a href="{{route('columns.show',$column->id)}}">Detail</a>
                        <a href="{{route('columns.edit',$column->id)}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$columns->links()}}
    <a class="btn btn-info" href="{{route('columns.create')}}">Add New</a>
@endsection