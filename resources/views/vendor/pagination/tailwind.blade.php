@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col sm:flex-row items-center justify-between gap-4">

        <div class="text-sm text-stone-500">
            @if ($paginator->firstItem())
                Menampilkan {{ $paginator->firstItem() }} sampai {{ $paginator->lastItem() }} dari {{ $paginator->total() }}
            @else
                {{ $paginator->count() }}
            @endif
        </div>

        <div class="flex items-center gap-1">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-400 cursor-not-allowed">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-600 hover:bg-amber-50 hover:text-amber-800 transition" aria-label="{{ __('pagination.previous') }}">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-400 cursor-default">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-amber-800 text-sm font-semibold text-white shadow-sm">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-600 hover:bg-amber-50 hover:text-amber-800 transition" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-600 hover:bg-amber-50 hover:text-amber-800 transition" aria-label="{{ __('pagination.next') }}">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm text-stone-400 cursor-not-allowed">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>
    </nav>
@endif