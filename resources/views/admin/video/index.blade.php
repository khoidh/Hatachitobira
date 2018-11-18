@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item active">{{__('動画一覧')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('videos.create')}}"><i class="la la-plus"></i>{{__('追加')}}</a>

        </div>
    </div>
@endsection
@section('content-title','動画一覧')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover tbl-resoure">
    <thead>
    <tr>
        <th>ID</th>
        <th>{{__('カテゴリ')}}</th>
        <th>{{__('URL')}}</th>
        <th>{{__('タイトル')}}</th>
        <th>{{__('サムネイル')}}</th>
        <th>{{__('表示順')}}</th>
        <th>{{__('タイプ')}}</th>
        <th>{{__('操作')}}</th>
        <th>{{__('表示')}}</th>

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
              <?php 
                  $type = '';
                  if($video->type==0) $type ='ジョブシャドウ';
                  if($video->type==1) $type ='ロールプレイ';
                  if($video->type==2) $type = 'コンセプトムービー';
               ?>
            <td>{{$type}}</td>
            <td>
                <div >
                            <a class="btn btn-info" href="{{route('videos.show',$video->id)}}">詳細</a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a class="btn btn-success" href="{{route('videos.edit',$video->id)}}">編集</a>
                        </div>
            </td>
            <td>{{ $video->display == 1 ? '表示' : '非表示'}}</td>
        </tr>
    @endforeach

    </tbody>
</table>
    </div>
{{$videos->links()}}
@endsection