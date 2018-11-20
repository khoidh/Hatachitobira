@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin/css/column.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('イベント')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item active">{{__('イベント一覧')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('events.create')}}" ><i class="la la-plus"></i> {{__('追加')}}</a>
        </div>
    </div>
@endsection
@section('content-title','Events')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover tbl-resoure">
    <thead>
    <tr>
        <th class="id">ID</th>
        <th>{{__('タイトル')}}</th>
        <th>{{__('イメージ')}}</th>
        <th>{{__('カテゴリ')}}</th>
        <th>{{__('表示順')}}</th>
        <th>{{__('受付期間')}}</th>
        <th>{{__('日程')}}</th>
        <th>{{__('操作')}}</th>
        <th>{{__('表示')}}</th>

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
            <td>{{$event->sort}}</td>
            <td>{{$event->time_from->format(config('const.ymdHi'))}}~{{$event->time_to->format(config('const.ymdHi'))}}</td>
            <td>{{$event->started_at->format(config('const.ymdHi'))}}~{{$event->closed_at->format(config('const.ymdHi'))}}</td>
            <td>
                <div >
                    <a class="btn btn-info" href="{{route('events.show',$event->id)}}">詳細</a>
                </div>
                <div style="margin-top: 10px;">
                    <a class="btn btn-success" href="{{route('events.edit',$event->id)}}">編集</a>
                </div>
            </td>
            <td>{{ $event->display == 1 ? '表示' : '非表示'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
{{ $events->links() }}

@endsection