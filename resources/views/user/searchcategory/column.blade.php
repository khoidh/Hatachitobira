@foreach($columns as $column)
    <div class="event-information">
        <div class="item">
            <div class="wrapper">
                <div class="icon">
                    <a href="{{route('column.show', $column->id)}}">
                        @php $image='image/column/'.$column->image; @endphp
                        <img class="image-column" src="{{file_exists($image)?asset($image): asset('image/column/column_default.jpg')}}">
                        <div class="favorite">
                            <i class="fa fa-heart-o" style="font-size:24px;"></i>
                        </div>
                    </a>
                </div>
                <div class="content clearfix" >
                    <div class="status clearfix"><h4 class="text-status">インタビュー</h4></div>
                    <div class="title clearfix "><h4 class="text-title">{{$column->title}}</h4></div>
                    <div class="category clearfix"><p class="text-category">{{$column->category_name}}</p></div>
                    <div class="date clearfix"><p class="text-date">{{date('Y.m.d',strtotime($column->created_at))}}</p></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $columns->links() }}