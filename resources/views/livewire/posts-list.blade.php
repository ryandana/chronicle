<div>
    <!-- Search -->
    <div class="my-12 relative">
        <x-tabler-search class="absolute top-3 left-3 text-gray-500 text-sm" />

        <input wire:model.live.debounce.300ms="search" type="text"
            class="w-full rounded-xl bg-gray-100 px-11 py-3 outline-0" placeholder="Cari berita yang kamu inginkan..">
    </div>

     <div class="mb-8">
        {{ $posts->links('vendor.pagination.custom') }}
    </div>

    @if ($posts->count())
        <div class="mb-6">
            <x-heading>
                @if ($search)
                    Hasil pencarian untuk: "{{ $search }}"
                @else
                    Berita Terbaru
                @endif
            </x-heading>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-24">
            @foreach ($posts as $post)
                <div
                    class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col">

                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}"
                            class="w-full md:h-[200px] h-[250px] object-cover transition-transform duration-600 group-hover:scale-105">
                    </div>

                    <div class="p-5 flex flex-col flex-grow justify-between">
                        <div class="flex flex-col space-y-1">

                            <div class="flex md:flex-row flex-col md:items-center items-start gap-2">
                                <span
                                    class="bg-yellow-600/20 text-yellow-600 rounded-md py-1 px-2 text-xs font-semibold uppercase">
                                    {{ $post->category->name }}
                                </span>
                                <span
                                    class="bg-yellow-600/20 text-yellow-600 rounded-md py-1 px-2 text-xs font-semibold uppercase">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <h2 class="text-lg font-bold text-gray-900">
                                {!! Str::limit(strip_tags(string: $post->title), 80) !!}
                            </h2>

                            <p class="text-sm text-gray-600">
                                {!! Str::limit(strip_tags($post->content), 250) !!}
                            </p>
                        </div>

                        <div class="mt-5 flex items-center justify-between">
                            <a href="{{ url('authors/' . $post->author->username) }}" class="flex items-center gap-2">
                                <img class="rounded-full h-7 w-7 object-cover"
                                    src="{{ asset('storage/' . $post->author->avatar) }}">
                                <span class="text-sm font-medium text-gray-600">{{ $post->author->nickname }}</span>
                            </a>

                            <a href="{{ url('posts/' . $post->slug) }}" wire:navigate
                                class="bg-yellow-600 text-white text-sm font-semibold px-3 py-1.5 rounded-lg">
                                Lebih Lanjut &raquo;
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center flex flex-col items-center gap-3 py-10">
            <h2 class="text-xl font-semibold">Tidak ada konten ditemukan</h2>
            <p>Coba kata kunci lain atau kembali ke halaman utama.</p>

            <a href="/"
                class="flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg">
                <x-heroicon-s-arrow-left class="w-5 h-5" />
                Kembali
            </a>
        </div>
    @endif

   

</div>
