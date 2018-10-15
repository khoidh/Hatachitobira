@if ($paginator->hasPages())
    <ul class="pager">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--<li class="disabled"><span>← Previous</span></li>--}}
            <li class="disabled"></li>
        @else
{{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>--}}
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        @endif


        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>--}}
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
        @else
            {{--<li class="disabled"><span>Next →</span></li>--}}
            <li class="disabled"></li>
        @endif
    </ul>
@endif