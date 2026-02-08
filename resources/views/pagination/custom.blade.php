@if ($paginator->hasPages())
<div class="flex flex-wrap items-center justify-between gap-3 pt-4">

    {{-- Info --}}
    <p class="text-sm text-gray-500">
        Showing
        {{ $paginator->firstItem() }}
        to
        {{ $paginator->lastItem() }}
        of
        {{ $paginator->total() }}
        Results
    </p>

    {{-- Pagination --}}
    <div class="flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                &larr;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-gray-50">
                &larr;
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)

            {{-- "..." --}}
            @if (is_string($element))
                <span class="flex h-9 min-w-[36px] items-center justify-center text-gray-400">
                    {{ $element }}
                </span>
            @endif

            {{-- Array of links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="flex h-9 min-w-[36px] items-center justify-center rounded-xl bg-[#EE4D37] text-sm font-semibold text-white">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600 hover:bg-gray-50">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-gray-50">
                &rarr;
            </a>
        @else
            <span
                class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed">
                &rarr;
            </span>
        @endif

    </div>
</div>
@endif
