<x-layout>

    <div class="max-w-7xl mx-auto mt-24">

        <h1 class="text-2xl font-bold mb-6">
            Kategori: {{ $category->name }}
        </h1>

        @if ($posts->isEmpty())
            <p class="text-gray-600">Tidak ada postingan pada kategori ini.</p>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
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
                                {!! Str::limit(strip_tags($post->title), 80) !!}
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

                            <a href="{{ url('posts/' . $post->slug) }}"
                                class="bg-yellow-600 text-white text-sm font-semibold px-3 py-1.5 rounded-lg">
                                Lebih Lanjut &raquo;
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>

    </div>

</x-layout>
