@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin/css/column.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Events</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">List Event</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('events.create')}}"><i class="la la-plus"></i>   Add New</a>

        </div>
    </div>
@endsection
@section('content-title','Events')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table mb-0">
    <thead>
    <tr>
        <th class="id">ID</th>
        <th class="title">Title</th>
        <th class="image">Image</th>
        <th class="category">Category</th>
        {{--<th class="sort">Sort</th>--}}
        <th class="startAt">登録時間</th>
        <th class="endAt">日程</th>
        <th class="function">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <th scope="row">{{$event->id}}</th>
            <td>{{$event->title}}</td>

            {{--<td>{{$event->image}}</td>--}}
            @php $image= 'images/admin/event/'.$event->image @endphp
            <td>
                <img width="150px" height="150px"
                     src="{{ file_exists($image)?asset($image):asset('images/admin/default.png')}}" >
             </td>

            <td>{{$event->category_name}}</td>
            {{--<td>{{$event->sort}}</td>--}}
            <td>{{$event->time_from}}~{{$event->time_to}}</td>
            <td>{{$event->started_at}}~{{$event->closed_at}}</td>
            <td>
                <a href="{{route('events.show',$event->id)}}"><i title="Detail" class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a>
                <a href="{{route('events.edit',$event->id)}}"><i title="Edit" class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
{{ $events->links() }}

@endsection