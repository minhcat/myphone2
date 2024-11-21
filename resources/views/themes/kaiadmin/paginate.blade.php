@if ($paginator->hasPages())
    <ul class="pagination pg-primary pull-right">
        {{-- Previous Page Link --}}
		@if ($paginator->currentPage() == 1)
			<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>
			<li class="page-item disabled"><a class="page-link" href="#"><</a></li>
		@else
			<li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}"><<</a></li>
			<li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
		@endif

        {{-- Pagination Elements --}}
		@for ($i = 1; $i <= $paginator->lastPage(); $i++)
			{{-- "Three Dots" Separator --}}
			{{-- <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
				<a href="{{ $paginator->url($i) }}">{{ $i }}</a>
			</li> --}}
			@if ($i == $paginator->currentPage())
				<li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
			@elseif (($i == $paginator->currentPage() + 1 || $i == $paginator->currentPage() + 2 || $i == $paginator->currentPage() - 1) || $i == $paginator->lastPage() || $i == 1)
				<li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
			@elseif ($i == $paginator->lastPage() - 1 || $i == $paginator->currentPage() - 2)
				<li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-ellipsis-h"></i></a></li>
			@endif
			{{-- Array Of Links --}}
			
		@endfor

        {{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">></a></li>
			<li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">>></a></li>
		@else
			<li class="page-item disabled"><a class="page-link" href="#">></a></li>
			<li class="page-item disabled"><a class="page-link" href="#">>></a></li>
		@endif
    </ul>
@endif