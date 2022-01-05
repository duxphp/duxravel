<nav class="">
    <ul class="flex flex-row gap-2 text-center">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="bg-gray-200 text-gray-400  " aria-label="@lang('pagination.previous')">
                <span class="py-2 px-4 block" aria-hidden="true">&lsaquo;&lsaquo;</span>
            </li>
        @else
            <li class="bg-white hover:bg-gray-100">
                <a class="py-2 block prev"  href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo;</a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="bg-white disabled"><span class="py-2 px-4 block">{{ $element }}</span></li>
            @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="bg-white bg-blue-600 text-white"><span class="py-2 px-4 block">{{ $page }}</span></li>
                        @else
                            <li class="bg-white hover:bg-gray-100"><a class="py-2 px-4 block" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
        @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="bg-white hover:bg-gray-100">
                    <a class="py-2 px-4 block" href="{{ $paginator->nextPageUrl() }}" rel="next"
                       aria-label="@lang('pagination.next')">&rsaquo;&rsaquo;</a>
                </li>
            @else
                <li class="bg-gray-200 text-gray-400 " aria-label="@lang('pagination.next')">
                    <span class="py-2 px-4 block" aria-hidden="true">&rsaquo;&rsaquo;</span>

                </li>
            @endif
    </ul>
</nav>
