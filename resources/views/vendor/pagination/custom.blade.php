@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="w-full">

        <div class="flex flex-col md:flex-row items-center justify-between gap-3 bg-gray-100 p-3 rounded-xl">

            {{-- Page Indicator --}}
            <div class="text-sm font-medium text-yellow-600 md:inline hidden">
                Halaman {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
            </div>

            <div class="inline-flex items-center gap-1">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 text-sm font-medium text-yellow-600 opacity-50 cursor-not-allowed">
                        &laquo;
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled"
                        class="px-3 py-2 text-sm font-medium text-yellow-600 hover:bg-gray-200 cursor-pointer rounded-md">
                        &laquo;
                    </button>
                @endif

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    {{-- "..." --}}
                    @if (is_string($element))
                        <span class="px-3 py-2 text-sm text-yellow-600/70">…</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page === $paginator->currentPage())
                                <span class="px-3 py-2 text-sm font-semibold bg-yellow-600 text-white rounded-md">
                                    {{ $page }}
                                </span>
                            @else
                                <button wire:click="gotoPage({{ $page }})"
                                    class="px-3 py-2 text-sm font-medium text-yellow-600 hover:bg-gray-200 cursor-pointer rounded-md">
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="px-3 py-2 text-sm font-medium text-yellow-600 hover:bg-gray-200 cursor-pointer rounded-md">
                        &raquo;
                    </button>
                @else
                    <span class="px-3 py-2 text-sm font-medium text-yellow-600 opacity-50 cursor-not-allowed">
                        &raquo;
                    </span>
                @endif

            </div>

        </div>
    </nav>
@endif
