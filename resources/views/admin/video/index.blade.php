@extends('admin.home')

@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">URL</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Sort</th>

    </tr>
    </thead>
    <tbody>
    @foreach($videos as $video)
        <tr>
            <th scope="row">{{$video->id}}</th>
            <td>{{$video->category_name}}</td>
            <td>{{$video->url}}</td>
            <td>{{$video->description}}</td>
            <td>{{$video->image}}</td>
            <td>{{$video->sort}}</td>
            <td>
                <a href="{{route('videos.show',$video->id)}}">Detail</a>
                <a href="{{route('videos.edit',$video->id)}}">Edit</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
{{$videos->links()}}
<a class="btn btn-info" href="{{route('videos.create')}}">Add New</a>
@endsection