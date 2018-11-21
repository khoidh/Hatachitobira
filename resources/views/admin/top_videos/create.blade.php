@extends('admin.home')
@section('content-header')
  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block" style="font-size: 30px">{{__('トップ動画')}}</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{__('ホーム')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">{{__('トップ動画一覧')}}</a></li>
                    <li class="breadcrumb-item active">{{__('追加')}}</li>
                </ol>
            </div>
        </div>
    </div>
   
@endsection
@section('content-title','トップ動画')
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
            <form action="{{route('topvideos.store')}}" enctype="multipart/form-data" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="video_type_id" class="col-sm-2 col-form-label">{{__('動画タイプ')}}</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="video_type_id" id="video_type_id" autofocus="">
                            <?php foreach ($types as $key => $type): ?>
                                <option <?php if(old('video_type_id') == $type->id) echo 'selected' ?> value="{{$type->id}}" >{{$type->name}}</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">{{__('タイトル')}}</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" placeholder="タイトル"  
                               value="{{old('title')}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="youtube_url" class="col-sm-2 col-form-label">{{__('YoutubeURL')}}</label>
                    <div class="col-sm-10">
                       <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="YoutubeURL"  
                               value="{{old('youtube_url')}}">
                    </div>
                </div>
                
                

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">{{__('サムネイル')}}</label>
                    <div class="col-sm-10">
                        <img src="{{asset('images/admin/default.png')}}" id="temp_img" width="150px" height="150px">
                        <input type="file" name="image" id="image"  accept="image/*" id="upload"  >
                        <input type="hidden" name="thumbnail" id="thumbnail" value="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">{{__('登録')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('customjavascript')
<script type="text/javascript">
    $(function(){
        $('input[type="file"]').change(function(e){
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = (e) => {
                selectedImage = e.target.result;
                $('#temp_img').attr('src', selectedImage);
                $('#thumbnail').val(file.name);
            };
            reader.readAsDataURL(file);
        });

    });
</script>
@endsection