@if ($paginator->hasPages())
    <ul class="wg-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <div class="pagination-item disabled">
                    <i class="icon-arrow-left"></i>
                </div>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-item animate-hover-btn">
                    <i class="icon-arrow-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <div class="pagination-item disabled">{{ $element }}</div>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <div class="pagination-item">{{ $page }}</div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="pagination-item animate-hover-btn">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-item animate-hover-btn">
                    <i class="icon-arrow-right"></i>
                </a>
            </li>
        @else
            <li>
                <div class="pagination-item disabled">
                    <i class="icon-arrow-right"></i>
                </div>
            </li>
        @endif
    </ul>
@endif
