@foreach($results as $result)
    @if(isset($result->items[0]))
    <div class="col-md-4 col-sm-6 portfolio-item">
        <div class="wrapper">
            <div class="thump video">
                {!! $result->items[0]->player->embedHtml !!}
            </div>
            <div class="description">
                <p>
                    {{ substr($result->items[0]->snippet->title, 0,20). '...' }}
                </p>

                <span>{{$result->items[0]->statistics->viewCount}} Views</span>
                <span>7 month ago</span>
                <strong>{{ $result->category }}</strong>
                
            </div>
        </div>
    </div>
    @endif
@endforeach
{{ $results->links() }}