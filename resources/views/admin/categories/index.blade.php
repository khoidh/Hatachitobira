@extends('admin.home')
@section('javascrip')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
@endsection
@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Category</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Category</a></li>
                    <li class="breadcrumb-item active">Category List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-info" href="{{route('categories.create')}}" ><i class="la la-plus"></i> Add New</a>
        </div>
    </div>
@endsection
@section('content-title','Categories')
@section('card-content')
@endsection
@section('content')
    <div class="clearfix panel-body">
        <table class="table table-striped table-bordered table-hover tbl-resoure" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Icon</th>
                    <th>Sort</th>
                    <th>Display</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr class="odd gradeX" align="left">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name}}</td>
                    <td>{{ $category->slug}}</td>
                    <td>
                        <img src="<?php echo asset('image/category/'.$category->icon) ?>" width="150px" height="150px">
                    </td>
                    <td>{{ $category->sort}}</td>
                    <td>{{ $category->display == 1 ? '表示' : '非表示'}}</td>
                    <td>{{ $category->description}}</td>
                    <td width="10%">
                        <a href="{{route('categories.show',$category->id)}}"><i title="Detail" class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a>
                        <a href="{{route('categories.edit',$category->id)}}"><i title="Edit" class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        <div id="myModal_delete" class="modal fade" role="dialog">
            <div class="modal-dialog" style="margin-top:300px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" style="text-align:center">Are you sure to want to delete this category
                            ?</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="text-align:center">
                        <a href="" class="btn btn-danger md-delete">Yes</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal_detail" class="modal fade" role="dialog">
            
        </div>
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