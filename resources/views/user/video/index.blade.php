@extends('layouts.app')
@section('content')
    <div class="row">
        <h3>動画から社会の選択肢を知って、マイテーマを探そう
        </h3>
        <div class="container">
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
            </div>

            </div>
        </div>
    </div>

@endsection