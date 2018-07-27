@extends('admin.home')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Sort</th>
            <th scope="col">Start At</th>
            <th scope="col">End At</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->title}}</td>
                <td>{{$event->image}}</td>
                <td>{{$event->category_id}}</td>
                <td>{{$event->sort}}</td>
                <td>{{$event->time_from}}</td>
                <td>{{$event->time_to}}</td>
                <td><form action="/events/{{$event->id}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する">
                    </form></td>
            </tr>


        </tbody>
    </table>
    <a class="btn btn-info" href="/events">一覧に戻る</a>

@endsection