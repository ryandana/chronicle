<x-layout>
    <div class="max-w-7xl mx-auto px-4 my-24">
        <div class="flex flex-col md:flex-row-reverse gap-10">
            <div class="w-full md:w-2/3 flex flex-col gap-6">

                <!-- Thumbnail -->
                <div class="relative flex overflow-hidden rounded-lg shadow-lg">
                    <img class="rounded-lg w-full hover:scale-105 duration-500 transition-transform"
                        src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                </div>

                <div class="flex flex-wrap justify-center md:justify-start gap-2 md:gap-3">
                    <!-- Author -->
                    <div class="flex items-center gap-1 bg-yellow-600/20 px-3 py-1.5 rounded-md">
                        <img class="rounded-full w-5 h-5" src="{{ asset('storage/' . $post->author->avatar) }}"
                            alt="{{ $post->author->nickname }}">
                        <span class="font-medium text-sm md:text-base">
                            {{ $post->author->nickname }}
                        </span>
                    </div>

                    <!-- Category -->
                    <div class="flex items-center gap-1 bg-yellow-600/20 px-3 py-1.5 rounded-md">
                        <x-heroicon-s-tag class="w-5 h-5" />
                        <span class="font-medium text-sm md:text-base">
                            {{ $post->category->name }}
                        </span>
                    </div>

                    <!-- Date -->
                    <div class="flex items-center gap-1 bg-yellow-600/20 px-3 py-1.5 rounded-md">
                        <x-heroicon-c-calendar-date-range class="h-5 w-5" />
                        <span class="font-medium text-sm md:text-base">
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                    </div>
                </div>


                <!-- Title -->
                <h1
                    class="font-bold md:text-4xl text-2xl md:text-start text-center text-gray-900 border-b-4 border-yellow-600 pb-6">
                    {{ $post->title }}
                </h1>

                <!-- Content -->
                <div
                    class="prose max-w-none prose-p:my-4 prose-h2:mt-8 prose-h2:mb-4 prose-img:rounded-xl prose-img:my-6">
                    {!! $post->content !!}
                </div>

                <!-- Navigation & Share -->
                <div class="flex items-center justify-between border-t pt-4 border-gray-200">

                    <a href="/" wire:navigate
                        class="flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow cursor-pointer transition">
                        <x-heroicon-s-arrow-left class="w-5 h-5" />
                        <span class="md:inline hidden">Kembali</span>
                    </a>

                    <button id="shareBtn"
                        class="flex items-center gap-2 px-4 py-2 bg-yellow-600 text-white font-semibold rounded-lg shadow cursor-pointer transition">
                        <x-heroicon-s-share class="w-5 h-5" />
                        <span class="md:inline hidden">Bagikan</span>
                    </button>
                </div>
            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="w-full md:w-1/3">
                <div class="md:sticky md:top-5 flex flex-col space-y-6">

                    <!-- Latest Posts -->
                    <div class="bg-white rounded-xl p-4 shadow">
                        <h2 class="text-lg font-semibold mb-4">Latest Posts</h2>

                        <div class="space-y-4">
                            @foreach ($latestPosts as $post)
                                <a wire:navigate href="{{ url('posts/' . $post->slug) }}" class="flex gap-3 group">

                                    <!-- Thumbnail -->
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                        class="w-20 h-16 object-cover rounded-lg" alt="{{ $post->title }}">

                                    <div class="flex-1">
                                        <!-- Title -->
                                        <h3 class="text-sm font-medium group-hover:text-blue-600 transition">
                                            {{ Str::limit($post->title, 50) }}
                                        </h3>

                                        <!-- Author -->
                                        <div class="flex items-center gap-2 mt-1 text-xs text-gray-500">
                                            <img src="{{ asset('storage/' . $post->author->avatar) }}"
                                                class="w-5 h-5 rounded-full">
                                            <span>{{ $post->author->nickname }}</span>
                                        </div>
                                    </div>

                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>

    <script>
        document.getElementById('shareBtn').addEventListener('click', async () => {
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: "{{ $post->title }}",
                        text: "Baca berita ini:",
                        url: "{{ request()->fullUrl() }}"
                    });
                } catch (err) {
                    console.log("Share dibatalkan:", err);
                }
            } else {
                alert("Fitur share native tidak didukung di browser ini.");
            }
        });
    </script>
</x-layout>
