@extends('layouts.app')
@section('content')
        <h3 class="text-title-video">動画から社会の選択肢を知って、マイテーマを探そう</h3>
    <div class="container">
        <div class="row">
            <div class="video">
                <div class="navbar-collapse collapse" id="navbar-filter">
                    <form method="post" action="{{route('video.search')}}" class="navbar-form" role="search">
                        {{ csrf_field() }}
                        <div class="form-group col-md-5 col-sm-6">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <span id="filter-date" class="col-md-7 col-sm-6">
                            <div class="form-group col-md-10 col-sm-10">
                                <input type="text" class="form-control" id ="description" name="description">
                            </div>
                            <button type="submit" id="btn-filter-pending" class="btn btn-basic col-md-1 col-sm-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </form>
                </div>
                @foreach($results as $result)
                    @if(isset($result->items[0]))
                    <div class="col-lg-4 col-sm-4 portfolio-item">
                        <div class="wrapper">
                            <div class="thump">
                                <a href="#">
                                    <img src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt="">
                                </a>
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
                            <div class="description">
                                <p>
                                    <?php 
                                        $title = $result->items[0]->snippet->title;
                                        substr($title, 0,20);
                                        echo $title. '...';
                                    ?>
                                    
                                </p>
                                <span>{{$result->items[0]->statistics->viewCount}} Views</span>
                                <span>7 month ago</span>
                                <strong>{{$result->category}}</strong>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="pagination video-pagination">
            {{ $results->links() }}
        </div>
    </div>
@endsection