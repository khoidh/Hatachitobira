@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>動画から社会の選択肢を知って、マイテーマを探そう
        </h3>
        <div class="row">
            <div class="video">
                <div class="navbar-collapse collapse" id="navbar-filter">
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <select name="filter_type" id="filter_type" class="form-control">
                                <option value="">Category</option>
                                <option value="date">Creation Date</option>
                                <option value="popularity">Popularity</option>
                                <option value="like_count">Total Likes</option>
                                <option value="comment_count">Total Comments</option>
                            </select>
                        </div>

                        <span id="filter-date">
                    <div class="form-group">
                        <input type="text" class="form-control" name="start_date" placeholder="" style="width:300px">
                    </div>
                        <button type="submit" id="btn-filter-pending" class="btn btn-info">Search</button>
                    </form>
                </div>
                @foreach($results as $result)
                    <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="wrapper">
                        <div class="thump">
                            <img src="{{$result->items[0]->snippet->thumbnails->standard->url}}" alt="">
                        </div>
                        <div class="description">
                            <div class="title">
                                <p>{{$result->items[0]->snippet->title}}</p>
                            </div>
                            <div class="footer">
                                <div class="viewcount">
                                    <p>{{$result->items[0]->statistics->viewCount}} Views</p>
                                </div>
                                <div class="date">
                                    {{--<p>{{$result->items[0]->snippet->publishedAt}}</p>--}}
                                    <p>7 month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>


@endsection