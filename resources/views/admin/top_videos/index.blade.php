@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('トップ動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item active">{{__('トップ動画一覧')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('categories.create')}}" ><i class="la la-plus"></i> {{__('追加')}}</a>
        </div>
    </div>
@endsection
@section('content-title','トップ動画一覧')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover tbl-resoure" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>{{__('ID')}}</th>
                    <th>{{__('動画タイプ')}}</th>
                    <th>{{__('タイトル')}}</th>
                    <th>{{__('サムネイル')}}</th>
                    <th>{{__('YoutubeURL')}}</th>
                    <th>{{__('操作')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($top_videos as $key => $video)
                <tr class="odd gradeX" align="left">
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->type }}</td>
                    <td>{{ $video->title }}</td>
                    <td>
                        {{ $video->thumbnail }}
                    </td>
                    <td>{{ $video->youtube_url }}</td>
                    <td>
                        <div >
                            <a class="btn btn-info" href="{{route('categories.show',$video->id)}}">詳細</a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a class="btn btn-success" href="{{route('categories.edit',$video->id)}}">編集</a>
                        </div>

                    </td>
                        
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $top_videos->links() }}
    
    </div>
@endsection
