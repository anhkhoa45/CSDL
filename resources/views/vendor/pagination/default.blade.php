@if ($paginator->hasPages())
    <ul class="pagination list-inline irs-ip-navigation clearfix">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="flaticon-arrows"></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="flaticon-arrows"></span></a></li>
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
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="flaticon-arrows-1"></span></a></li>
        @else
            <li class="disabled"><span class="flaticon-arrows-1"></span></li>
        @endif
    </ul>
@endif
