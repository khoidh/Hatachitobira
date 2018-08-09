@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>動画から社会の選択肢を知って、マイテーマを探そう
        </h3>
        <div class="row">
            <div class="video">
                <div class="navbar-collapse collapse" id="navbar-filter">
                    <form method="post" action="{{route('video.index')}}" class="navbar-form" role="search">
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
                            <?php echo ($result->items[0]->player->embedHtml) ?>

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
                                    {{--TODO xử lý tháng--}}
                                    <p>7 month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        {{ $results->links() }}

    </div>


@endsection