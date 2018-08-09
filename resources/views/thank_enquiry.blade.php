@extends('layouts.app')
@section('content')
<div class="container enquiry">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="clearfix panel-body pd-b-0">
                    <div class="alert alert-success">
                        <p>Thanks your for enquiry</p>
                        <p>Your's enquiry sent to admin</p>
                    </div>
                    <p><a href="{{ url('/enquiry')}}" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
