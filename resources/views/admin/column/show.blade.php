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