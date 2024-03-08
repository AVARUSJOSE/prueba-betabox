@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a href="@if ($paginator->onFirstPage()) javascript:void(0) @else {{ $paginator->previousPageUrl() }} @endIf"
                    class="page-link">
                    Anterior
                </a>
            </li>
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled">
                        <a>{{ $element }}</a>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a href="javascript:void(0)" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <li class="page-item">
                <a href="@if ($paginator->hasMorePages()) {{ $paginator->nextPageUrl() }} @else javascript:void(0) @endif"
                    class="page-link">
                    Siguiente
                </a>
            </li>
        </ul>
    </nav>
@endif
