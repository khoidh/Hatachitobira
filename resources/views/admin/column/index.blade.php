@extends('admin.home')

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('admin_plugin/css/column.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('コラム')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item active">{{__('コラム一覧')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('columns.create')}}"><i class="la la-plus"></i>{{__('追加')}}</a>
        </div>
    </div>
@endsection
@section('content-title','コラム一覧')
@section('card-content')
@endsection
@section('content')
    <div class="clearfix panel-body">
        <table class="table table-striped table-bordered table-hover tbl-resoure">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{__('タイトル')}}</th>
                <th>{{__('説明')}}</th>
                <th>{{__('イメージ')}}</th>
                <th>{{__('カテゴリ')}}</th>
                <th>{{__('Sort')}}</th>
                <th>{{__('タイプ')}}</th>
                <th>{{__('操作')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($columns as $column)
                <tr>
                    <th scope="row">{{$column->id}}</th>
                    <td>{{$column->title}}</td>
                    <td>{!!str_limit($column->description, $limit = 150, $end = '...')!!}</td>

                    @php $image= 'images/admin/column/'.$column->image @endphp
                    <td><img width="150px" height="150px"
                             src="{{ file_exists($image)?asset($image):asset('images/admin/default.png')}}" ></td>

                    <td>{{$column->category_name}}</td>
                    <td>{{$column->sort}}</td>

                    @php
                        $type=($column->type==0)?'インタビュー':'コラム';
                    @endphp
                    <td>{{$type}}</td>
                    <td>
                        <a href="{{route('columns.show',$column->id)}}"><i title="Detail" class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a>
                        <a href="{{route('columns.edit',$column->id)}}"><i title="Edit" class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$columns->links()}}
@endsection