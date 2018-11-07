@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Videos</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">List Video</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('videos.create')}}"><i class="la la-plus"></i>   Add New</a>

        </div>
    </div>
@endsection
@section('content-title','Videos')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>URL</th>
        <th>Title</th>
        <th>Thumpnail</th>
        <th>Sort</th>
        <th>Type</th>
        <th>Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($videos as $video)
        <tr>
            <th scope="row">{{$video->id}}</th>
            <td>{{$video->category_name}}</td>
            <td>{{$video->url}}</td>
            <td>{{$video->title}}</td>
            <td>
                <img src="{{$video->thumbnails}}" style="width: 150px; height: 150px">
                
            </td>
            <td>{{$video->sort}}</td>
            @php
                $type=($video->type==0)?'ジョブシャドウ':'ロールプレイ';
            @endphp
            <td>{{$type}}</td>
            <td>
                <a href="{{route('videos.show',$video->id)}}"><i title="Detail" class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a>
                <a href="{{route('videos.edit',$video->id)}}"><i title="Edit" class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
    </div>
{{$videos->links()}}
@endsection