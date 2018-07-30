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

    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <th scope="row">{{$event->id}}</th>
            <td>{{$event->title}}</td>
            <td>{{$event->image}}</td>
            <td>{{$event->category_id}}</td>
            <td>{{$event->sort}}</td>
            <td>{{$event->time_from}}</td>
            <td>{{$event->time_to}}</td>
            <td>
                <a href="/events/{{$event->id}}">Detail</a>
                <a href="/events/{{$event->id}}/edit">Edit</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
<a class="btn btn-info" href="{{route('events.create')}}">Add New</a>
@endsection