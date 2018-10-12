@if($paginator->lastPage() > 1)
	@if($paginator->currentPage() > 1)
	<li class="page-item disabled" aria-disabled="true" aria-label="&amp;laquo; Previous">
        <span class="page-link" href="{{$paginator->url($paginator->currentPage()-1)}}" aria-hidden="true"><<</span>
    </li>
    @endif
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a class="page-link" href="{{$paginator->url($paginator->currentPage()+1)}}" rel="next" aria-label="»">>></a>
    </li>
@else
	<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
@endif