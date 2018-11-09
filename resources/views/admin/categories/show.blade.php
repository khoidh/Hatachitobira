@extends('admin.home')

@section('css')
    @parent
@endsection

@section('content-header')
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('カテゴリ')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('カテゴリ一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('ビュー')}}</li>
                </ol>
            </div>
        </div>
    </div>

@endsection
@section('content-title','カテゴリ情報')
@section('card-content')
@endsection
@section('content')

  <div class="form-group row">
    <label for="id" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input id="id" value="{{$category->id}}" class="form-control" disabled="" >
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">{{__('お名前')}}</label>
    <div class="col-sm-10">
      <input id="name" value="{{$category->name}}" class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">{{__('説明')}}</label>
    <div class="col-sm-10">
      <input id="description" value="{{$category->description}}"class="form-control" disabled="">
    </div>
  </div>
    <div class="form-group row">
    <label for="slug" class="col-sm-2 col-form-label">{{__('Slug')}}</label>
    <div class="col-sm-10">
      <input id="slug" value="{{$category->slug}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="icon" class="col-sm-2 col-form-label">{{__('アイコン')}}</label>
    <div class="col-sm-10">
      <img style="width: 150px; height: 150px" src="<?php echo asset('images/admin/category/'.$category->icon) ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="sort" class="col-sm-2 col-form-label">{{__('表示順')}}</label>
    <div class="col-sm-10">
      <input id="sort" value="{{$category->sort}}"class="form-control" disabled="">
    </div>
  </div>
  <div class="form-group row">
    <label for="display" class="col-sm-2 col-form-label">{{__('表示')}}</label>
    <div class="col-sm-10">
      <input id="display" value="<?php echo ($category->display==0)?'非表示':'表示' ?>"class="form-control" disabled="">
    </div>
  </div>

  
  <div class="form-group row">
    <div class="col-sm-10">
          <a class="btn btn-info" href="{{route('categories.index')}}">一覧に戻る</a>

    </div>
    <form action="{{route('categories.destroy', $category->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <input class="btn btn-danger" type="submit" name="" value="削除する" onclick="return confirm('削除する、よろしいでしょうか')">
                    </form>
  </div>
@endsection