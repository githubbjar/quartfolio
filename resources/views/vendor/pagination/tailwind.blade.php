@if ($paginator->hasPages())
    @php
    // Base button
    $btn = 'inline-flex items-center px-4 py-3 text-base font-medium transition';

    // Prev / Next
    $btnPage = $btn . '
        bg-white text-black border border-black
        hover:bg-black hover:text-white
        cursor-pointer
    ';

    // Active page (current)
    $btnActive = $btn . '
        bg-black text-white border border-black
    ';

    // Inactive page numbers
    $btnPage = $btn . '
        bg-white text-black
        hover:bg-gray-200
        cursor-pointer
    ';

    // Disabled
    $btnDisabled = $btn . '
        bg-white text-white
        cursor-not-allowed
    ';

    $num = 'min-w-[48px] justify-center';
    @endphp

    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between gap-3">
        {{-- Mobile: Prev / Next --}}
        <div class="flex flex-1 justify-between sm:hidden">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="{{ $btnDisabled }}">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="{{ $btnPage }}">Previous</a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="{{ $btnPage }}">Next</a>
            @else
                <span class="{{ $btnDisabled }}">Next</span>
            @endif
        </div>

        {{-- Desktop: Prev / Numbers / Next --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-center">
            <div class="flex items-center gap-2">
                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="{{ $btnDisabled }}" aria-disabled="true" aria-label="Previous">&larr;</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="{{ $btnPage }}" aria-label="Previous">&larr;</a>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)
                    {{-- "..." --}}
                    @if (is_string($element))
                        <span class="{{ $btnActive }} {{ $num }}" aria-disabled="true">{{ $element }}</span>
                    @endif

                    {{-- Page links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="{{ $btnActive }} {{ $num }}" aria-current="page">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="{{ $btnPage }} {{ $num }}" aria-label="Go to page {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="{{ $btnPage }}" aria-label="Next">&rarr;</a>
                @else
                    <span class="{{ $btnDisabled }}" aria-disabled="true" aria-label="Next">&rarr;</span>
                @endif
            </div>
        </div>
    </nav>
@endif
