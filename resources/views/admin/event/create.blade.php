@extends('admin.home')

@section('css')
    @parent
    <style>
        #file {
            display: none;
        }

        .file-Select {
            max-width: 125px;
            max-height: 125px;
            margin-top: 10px;
            /*border: 1px solid #ddd;*/
            /*border-radius: 4px;*/
            /*line-height: 10px;*/
            /*padding: 4px;*/
        }

        /* this code is not required */
        .btn.btn-default.btn-upload {
            position: relative;
            z-index: 1;
            border: 1px solid #ddd;
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;
            line-height: 16px;
            padding: .4em ;
            margin: .2em;
            height: 30px;
        }

        .has-icon .form-control {
            padding-left: 2.375rem;
        }

        .has-icon .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            /*height: 2.375rem;*/
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;

            /*color: #4d4d4d;*/
            height: 100%;
            font-size: 18px;
            display: flex;
            align-items: center;
            left: 25px;
        }
    </style>
@endsection
@section('javascrip')
    <script src= "{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        $(document).ready(function () {
            //this code is not required
            $('#file').change(function(){
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        selectedImage = e.target.result;
                        $('.file-Select').attr('src', selectedImage);
                        $('.file-Select').attr('style','border: 1px solid #ddd; border-radius: 4px; line-height: 10px; padding: 4px');
                    };
                    reader.readAsDataURL(this.files[0]);
                    $('.file-edited-check').val(true);
                }
            });
        })
    </script>
@endsection

@section('content-header')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">Events</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                    <li class="breadcrumb-item active">Add new </li>
                </ol>
            </div>
        </div>
    </div>
    
@endsection
@section('content-title','Events')
@section('card-content')
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row justify-content-md-center">
        <div class="col-md-10">
<form  action="{{route('events.store')}}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="inputState">Category</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                {{--<option selected>Choose Category</option>--}}
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3"  class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required="true">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="content" placeholder="Content" id="ckeditor-text" required="true"></textarea>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor-text' );
        </script>
    </div>

    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Upload Image</label>
        {{--<div class="col-sm-10">--}}
            {{--<input type="file" name="image" value="{{ old('image') }}" required="true">--}}
        {{--</div>--}}
        <div class="col-sm-10">
            <div class="upload-actions">
                <label class="btn btn-default btn-upload" for="file" ><i class="fa fa-upload"></i> Choose file</label>
                <input type="file" id="file" accept="image/*" name="image">
            </div>
            <div>
                <img class="file-Select">
                <input class="file-edited-check" type="hidden" name="image_edited_check" value=false>
            </div>
        </div>
    </div>

     <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Sort</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" value="{{ old('sort') }}"
                   min="1" max="2147483647"
                   onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                   required="true">
        </div>
    </div>

    {{--Thời gian đăng ký--}}
    <div class="form-group row">
        <label for="time_from" class="col-sm-2 col-form-label">登録時間</label>
        <div class="col-sm-10" style="padding: 0">
            <div class="row">
                {{--time_from--}}
                <div class="col-sm-6">
                    <label for="time_from" class="col-sm-12 col-form-label">Start at </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="time_from_date" maxlength="8" required >
                            </div>
                            <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                <input type="time" class="form-control" name="time_from_time" required >
                            </div>
                        </div>
                    </div>
                </div>
                {{--time_to--}}
                <div class="col-sm-6">
                    <label for="time_to" class="col-sm-12 col-form-label">End at </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="time_to_date" maxlength="8" minlength="8" required="true">
                            </div>
                            <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                <input type="time" class="form-control" name="time_to_time" required >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--End thời gian đăng ký--}}

    {{--Thời gian diễn ra event--}}
    <div class="form-group row">
        <lable  for="started_at" class="col-sm-2 col-form-lable">日程</lable>
        <div class="col-sm-10" style="padding: 0">
            <div class="row">
                {{--Start hour--}}
                <div class="col-sm-6">
                    <label for="started_at" class="col-sm-12 col-form-label">Start at </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="started_at_date" maxlength="10" minlength="10" required >
                            </div>
                            <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                <input type="time" class="form-control" name="started_at_time" required >
                            </div>
                        </div>
                    </div>
                </div>
                {{--Close hour--}}
                <div class="col-sm-6">
                    <label for="closed_at" class="col-sm-12 col-form-label">Start at </label>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="closed_at_date" maxlength="10" minlength="10" required >
                            </div>
                            <div class="col-sm-5" style="padding-left: 0; padding-right: 0">
                                <input type="time" class="form-control" name="closed_at_time" required >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--End thời gian diễn ra event--}}

    {{--Địa điểm--}}
    <div class="form-group row">
        <lable class="col-sm-2 col-form-lable">場所</lable>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="場所" require="true" maxlength="256">
        </div>
    </div>

    {{--Tóm tắt--}}
    <div class="form-group row">
        <lable class="col-sm-2 col-form-lable">概要</lable>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="overview" placeholder="概要" required="true">
        </div>
    </div>

    {{--Phí tham gia--}}
    <div class="form-group has-icon row">
        <lable class="col-sm-2 col-form-lable">参加費</lable>
        <div class="col-sm-10">
            <span class="fa fa-jpy form-control-feedback" ></span>
            <input type="number" class="form-control" name="entry_fee" placeholder="参加費"
                   min="0" max="1000000000"
                   onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                   required="true">
        </div>
    </div>

    {{--Sức chứa--}}
    <div class="form-group has-icon row">
        <lable class="col-sm-2 col-form-lable">定員</lable>
        <div class="col-sm-10">
            <span class="fa fa-users form-control-feedback" ></span>
            <input type="number" class="form-control" name="capacity" placeholder="定員"
                   min="0" max="1000000"
                   onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                   required="true">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </div>
</form>
        </div>
    </div>
    @endsection