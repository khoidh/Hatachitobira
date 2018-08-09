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
            <tr>
                <th scope="row">{{$video->id}}</th>
                <td>{{$video->category_name}}</td>
                <td>{{$video->url}}</td>
                <td>{{$video->description}}</td>
                <td>{{$video->image}}</td>
                <td>{{$video->sort}}</td>
                <td><form action="{{route('videos.destroy', $video->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する">
                    </form></td>
            </tr>


        </tbody>
    </table>
    <a class="btn btn-info" href="{{route('videos.index')}}">一覧に戻る</a>

@endsection