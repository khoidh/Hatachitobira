@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>動画から社会の選択肢を知って、マイテーマを探そう
        </h3>
        <div class="row">
            <div class="video">
                <div class="navbar-collapse collapse" id="navbar-filter">
                    <form method="post" action="{{route('video.search')}}" class="navbar-form" role="search">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <span id="filter-date">
                    <div class="form-group">
                        <input type="text" class="form-control" id ="description" name="description" style="width:300px">
                    </div>
                        <button type="submit" id="btn-filter-pending" class="btn btn-info">Search</button>
                        </span>
                    </form>
                </div>
                @foreach($results as $result)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="wrapper">
                        <div class="thump">
                            <!-- <img src="{{  $result->items[0]->snippet->thumbnails->medium->url}}" alt=""> -->
                            <?php echo ($result->items[0]->player->embedHtml) ?>
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
                            <span>
                                @if(Auth::user())
                                <form action="{{route('video.favorite')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="<?php if(Auth::user()) echo Auth::user()->id?>">
                                    <input type="hidden" name="video_id" value="{{$result->id}}">
                                    <button type="submit" class="fa fa-thumbs-o-up"></button>
                                </form>
                                @else
                                    <div type="submit">
                                        <button type="submit" class="fa fa-thumbs-o-up" data-toggle="modal" data-target="#modal_login"></button>
                                    </div>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        {{ $results->links() }}

    </div>


@endsection