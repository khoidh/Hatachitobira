@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin_plugin/css/column.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('columns.index') }}">Columns</a></li>
                    <li class="breadcrumb-item active">Show </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{route('columns.create')}}"><i class="la la-plus"></i>   Add New</a>
                <a class="dropdown-item" href="{{route('columns.edit',$column->id)}}"><i class="la la-pencil-square"></i>   Edit</a>
                <a class="dropdown-item" href="#"><i class="la la-times"></i>   Cancel</a>
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
            <tr>
                <th scope="row">{{$column->id}}</th>
                <td>{{$column->title}}</td>
                <td>{{$column->description}}</td>

                @php $image= 'image/column/'.$column->image @endphp
                <td><img width="100px" height="100px"
                         src="{{ file_exists($image)?asset($image):asset('image/column/column_default.jpg')}}" ></td>

                <td>{{$column->category_name}}</td>
{{--                <td>{{$column->sort}}</td>--}}
                <td>
                    <form action="{{route('columns.destroy', $column->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">
                    </form>
                </td>
            </tr>


            </tbody>
        </table>
    </div>
    <a class="btn btn-info" href="{{route('columns.index')}}">一覧に戻る </a>

@endsection