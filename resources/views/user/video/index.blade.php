@extends('layouts.app')
@section('title-e', 'My Theme')
@section('title-black', '動画から将来の選択肢を知って')
@section('title-blackspan', 'の種をみつけよう')
@section('title-j')
マイテーマ
@endsection
@section('content')
    <div class="container video">
        <div class="row">
            <div class="form-group col-md-6 col-sm-6">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-6">
                <div class="topnav">
                    <div class="search-container">
                        <input type="text" placeholder="" name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row video-list">
            @foreach($results as $result)
                @if(isset($result->items[0]))
                <div class="col-lg-4 col-sm-4 col-md-4 video-detail">
                    <div class="wrapper">
                        <div class="thump">
                            <div class="browse-details" data-toggle="modal" data-target="#modal_video">
                                <img src="{{ asset('image/video/btn-play.png')}}" alt="">
                                @if(Auth::user())
                                <form action="{{route('video.favorite')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="<?php if(Auth::user()) echo Auth::user()->id?>">
                                    <input type="hidden" name="video_id" value="{{$result->id}}">
                                    <input type="submit" class="fa fa-thumbs-o-up"></input>
                                </form>
                                @else
                                    <div class="favorite" data-toggle="modal" data-target="#modal_login"><i class="fa fa-heart-o"></i></div>
                                @endif
                            </div>
                            <a href="#">
                                <img class="img-icon" src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                            </a>
                        </div>
                        <div class="description">
                            <p>
                                <?php 
                                    $title = $result->items[0]->snippet->title;
                                    substr($title, 0,20);
                                    echo $title. '...';
                                ?>
                                
                            </p>
                            <span>{{$result->items[0]->statistics->viewCount}} Views /</span>
                            <span>7 month ago /</span>
                            <span>{{$result->category}}</span>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="paging text-center clearfix">
            {{ $results->links() }}
        </div>
        
    </div>

    <div id="modal_video" class="modal fade modal_register" role="dialog">
        <div class="modal-dialog" style="margin-top:150px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align:center">Login</h3>
                </div>
                <div class="modal-body" style="text-align:center">
                    <div class="panel-body">
                        <span class="error-login" style="color:red;font-size:16px;"></span>
                        <form class="form-horizontal" id="form-login">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary" id="btnlogin">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>


                        </form>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-3">
                                    <a href="{{ url('/auth/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
@endsection