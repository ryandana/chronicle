@php
    $path = trim(request()->path(), '/');
    $segments = $path === '' ? [] : explode('/', $path);
@endphp

@if (count($segments) > 0)
    <nav class="my-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-sm">
            {{-- HOME --}}
            <li>
                <a href="{{ url('/') }}" class="text-yellow-600 hover:underline">Beranda</a>
            </li>

            @php $accumulated = ''; @endphp

            @foreach ($segments as $segment)
                @php
                    $accumulated .= '/' . $segment;
                    $label = ucwords(str_replace(['-', '_'], ' ', $segment));
                @endphp

                <li class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>

                    @if ($loop->last)
                        <span class="text-gray-400">{!! Str::limit(strip_tags($label), 70) !!}</span>
                    @else
                        <a wire:navigate href="{{ url($accumulated) }}" class="text-yellow-600 hover:underline">
                            {!! Str::limit(strip_tags($label), 70) !!}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
