@extends('admin.home')

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
        @foreach($columns as $column)
            <tr>
                <th scope="row">{{$column->id}}</th>
                <td>{{$column->title}}</td>
                <td>{{$column->description}}</td>
                <td>{{$column->image}}</td>
                <td>{{$column->category_name}}</td>
                <td>{{$column->sort}}</td>
                <td>
                    <a href="{{route('columns.show',$column->id)}}">Detail</a>
                    <a href="{{route('columns.edit',$column->id)}}">Edit</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <a class="btn btn-info" href="{{route('columns.create')}}">Add New</a>
@endsection