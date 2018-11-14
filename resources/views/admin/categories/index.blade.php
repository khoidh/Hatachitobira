@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('カテゴリ')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item active">{{__('カテゴリ一覧')}}</li>
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
@section('content-title','カテゴリ一覧')
@section('card-content')
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover tbl-resoure" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>{{__('ID')}}</th>
                    <th>{{__('お名前')}}</th>
                    <th>{{__('アイコン')}}</th>
                    <th>{{__('表示順')}}</th>
                    <th>{{__('表示')}}</th>
                    <th>{{__('説明')}}</th>
                    <th>{{__('操作')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr class="odd gradeX" align="left">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name}}</td>
                    <td>
                        <img src="<?php echo asset('images/admin/category/'.$category->icon) ?>" width="150px" height="150px">
                    </td>
                    <td>{{ $category->sort}}</td>
                    <td>{{ $category->display == 1 ? '表示' : '非表示'}}</td>
                    <td>{{ $category->description}}</td>
                    <td>
                        <div >
                            <a class="btn btn-info" href="{{route('categories.show',$category->id)}}">詳細</a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a class="btn btn-success" href="{{route('categories.edit',$category->id)}}">編集</a>
                        </div>

                    </td>
                        
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    
    </div>
@endsection
@section('customjavascript')
<script type="text/javascript">
    $(document).ready(function () {
        
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            $('.btn-danger.md-delete').attr('href', $(this).attr('data-url'));
        });

        $(document).on('click','.details',function(e){
            $.ajax({
                type: 'get',
                url: $(this).data('url'),
                datatype: "html",
                success: function (key) {
                    $('#myModal_detail').html(key);
                    $('#myModal_detail').modal('show');
                }
            });
        });
    })
</script>
@endsection