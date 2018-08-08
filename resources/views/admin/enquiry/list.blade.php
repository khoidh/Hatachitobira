@extends('admin.home')
@section('javascrip')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="{{ asset('css/jquery.datatables.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- <a class="btn btn-info" href="{{route('events.index')}}">一覧に戻る</a> -->
    <div class="clearfix col-md-12" style="background-color: black;color: #fff;margin-bottom: 20px;">
        <h2>Enquity List</h2>
    </div>
    <div class="clearfix panel-body">
        <table class="table table-striped table-bordered table-hover tbl-resoure" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquiryData as $key => $enquiry)
                <tr class="odd gradeX" align="left">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $enquiry->first_name}} {{$enquiry->last_name}}</td>
                    <td>{{ $enquiry->email}}</td>
                    <td>{{ $enquiry->content}}</td>
                    <td>{{ date('d M Y',strtotime($enquiry->created_at))}}</td>
                    <td width="10%">
                        <a class="details" href="#" style="color: #848383" data-url="{{ route('enquiry.show', $enquiry->id) }}"><i title="Detail" class="fa fa-info-circle fa-2x" aria-hidden="true"></i></a>
                        <!-- <a href="#" style="color: #848383" data-toggle="modal" data-target="#myModal_edit"><i title="Edit" class="fa fa-pencil fa-2x" aria-hidden="true"></i></i></a> -->
                        <a class="delete" href="#" style="color: #848383" data-toggle="modal" data-target="#myModal_delete" data-url="{{ route('admin.delete-enquiry', $enquiry->id) }}"><i title="Delete" class="fa fa-trash fa-2x" aria-hidden="true"></i></i></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="myModal_delete" class="modal fade" role="dialog">
            <div class="modal-dialog" style="margin-top:300px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" style="text-align:center">Are you sure to want to delete this member
                            ?</h3>
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
<script src="{{ asset('js/jquery.datatables.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true,
            lengthMenu: [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]]
        });

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