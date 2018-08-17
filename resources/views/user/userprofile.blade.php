@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/userprofile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container user-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading ">ユーザープロフィール</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="content-form">
                            <div class="clearfix">
                                <div class="col-md-9 form-left">
                                    <div class="form-group">
                                        <div class="col-md-3 control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-md-9 text-input-full">
                                            <input id="name" type="text" class="form-control" name="name" value="{{Auth::guest() ? '' : Auth::user()->name}}" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 control-label">
                                            <label for="name">メールアドレス</label>
                                        </div>
                                        <div class="col-md-9 text-input-full">
                                            <input id="name" type="text" class="form-control" name="email" value="{{Auth::guest() ? '' : Auth::user()->email}}" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 control-label">
                                            <label for="name">Birthday</label>
                                        </div>
                                        <div class="col-md-9 text-input-full">
                                            <input id="name" type="text" class="form-control" name="birthday" value="{{Auth::guest() ? '' : Auth::user()->birthday}}" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 form-right">
                                    <div class="form-group">
                                        <div class="col-md-10 text-input-full">
                                            <div class="form-group input-upload clearfix">
                                                <div class="col-md-8 img-upload">
                                                    <img src="{{asset('image/img-default-el.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="form-group clearfix">
                                                <div class="col-md-8">
                                                    <input id="input-1a" type="file" class="file" data-show-preview="false"
                                                           name="fImages">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 clearfix ">
                            <button type="submit" class="submit btn">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset('js/fileinput.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#input-1a',function(e){
                var tmppath = URL.createObjectURL(e.target.files[0]);
                $('.img-upload').find('img').attr('src',tmppath);
            });
        });
    </script>
@endsection