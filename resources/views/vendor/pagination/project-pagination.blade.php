@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span><span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
        <span class="sr-only">Previous</span></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
        <span class="sr-only">Previous</span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span>{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item "><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
        @else
            <li class="page-item disabled"><span><span aria-hidden="true"><i class="fa fa-angle-right"></i></span><span class="sr-only">Next</span></span></li>
        @endif
    </ul>
@endif