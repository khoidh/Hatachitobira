@extends('admin.home')

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">{{__('一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('追加')}}</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('css')
    @parent
    <style>
        .multiselect.dropdown-toggle.btn.btn-default {
            width: 200px;
        }
    </style>
@endsection
@section('content-title','動画情報')
@section('card-content')
@endsection
@section('content')
@if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
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

<form action="{{route('videos.store')}}"  enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="form-group row">

        <label class="col-sm-2 col-form-label" for="category_id">{{__('カテゴリ')}}</label>
        <div class="col-sm-10">
            <input type="hidden" name="category_id" id="category_id">
            <select name="" id="category_id_select" class="form-control" multiple="multiple">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" placeholder="タイトル"
                   value="{{old('title')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label">{{__('URL')}}</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="url" id="url" placeholder="URL"
                   value="{{old('url')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="sort"
                   value="{{old('sort')}}">

        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">{{__('タイプ')}}</label>
        <div class="col-sm-10">
            <select type="number" name="type" id="type" class="form-control" tabindex=1>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="display" class="col-sm-2 col-form-label">{{__('表示')}}</label>
        <div class="col-sm-10">
            <select class="form-control" name="display" id="display">
                <option value="1" <?php if(old('display') == 1) echo 'selected' ?>>表示</option>
                <option value="0" <?php if(old('display') == 0) echo 'selected' ?>>非表示</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" id="btnApply" class="btn btn-primary">{{__('登録')}}</button>
        </div>
    </div>
</form>
        </div>
    </div>
    @endsection
@section('customjavascript')
<script type="text/javascript">
    
    $('#category_id_select').multiselect();
    $('#btnApply').click(function(e){
        var checked = $('.checkbox').find('input:checked'); 
        var type = getType(checked);
        console.log(type)
        $('input[name=category_id]').val(type);  
        
    })

    function getType(checked){
        var ids = [];
        checked.each(function () {
            ids.push($(this).val());
        });
        return ids;
    }
</script>
@endsection