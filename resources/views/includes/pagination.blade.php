@if($paginator->lastPage() > 1)
	@if($paginator->currentPage() > 1)
	<li class="page-item" aria-disabled="true" aria-label="&amp;laquo; Previous">
        <span class="page-link" href="{{$paginator->url($paginator->currentPage()-1)}}" aria-hidden="true"><<</span>
    </li>
    @endif
    @if($paginator->lastPage() > 6)
        @if($paginator->currentPage() < 4)
             @for ($i = 1; $i <= 6; $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        @else
            @for ($i = $paginator->currentPage() - 2; $i <= $paginator->currentPage() + 3; $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        @endif
    @else
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
    @endif
    @if($paginator->currentPage() < $paginator->lastPage())
    <li class="page-item">
        <a class="page-link" href="{{$paginator->url($paginator->currentPage()+1)}}" rel="next" aria-label="»">>></a>
    </li>
    @endif
@endif
	