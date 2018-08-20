@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Columns</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Drag &amp; Drop
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Action</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="card-bootstrap.html">Add</a>
                <a class="dropdown-item" href="component-buttons-extended.html">Import</a>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Sort</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$column->id}}</th>
            <td>{{$column->title}}</td>
            <td>{{$column->description}}</td>
            <td>{{$column->image}}</td>
            <td>{{$column->category_name}}</td>
            <td>{{$column->sort}}</td>
            <td>
                <form action="{{route('columns.destroy', $column->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <input class="btn btn-danger" type="submit" name="" value="削除する">
                </form>
            </td>
        </tr>


        </tbody>
    </table>
    <a class="btn btn-info" href="{{route('events.index')}}">一覧に戻る</a>

@endsection