<x-layout>
    <div class="flex flex-col gap-6 my-24 max-w-4xl mx-auto px-4">
        <!-- Thumbnail -->
        <div class="relative flex overflow-hidden rounded-lg shadow-lg">
            <img class="rounded-lg w-full hover:scale-105 duration-500 transition-transform"
                src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
        </div>

        <div class="flex items- md:justify-start justify-center gap-3">
            <div class="flex items-center gap-1 bg-yellow-400/20 p-2 rounded-md">
                <img class="rounded-full w-5" src="{{ asset('storage/' . $post->author->avatar) }}"
                    alt="{{ $post->author->nickname }}">
                <span class="font-medium">{{ $post->author->nickname }}</span>
            </div>
            <div class="flex items-center gap-1 bg-yellow-400/20 p-2 rounded-md">
                <x-heroicon-s-tag class="w-5 h-5"/>
                <span class="font-medium">{{ $post->category->name }}</span>
            </div>
            <div class="flex items-center gap-1 bg-yellow-400/20 p-2 rounded-md">
                <x-heroicon-c-calendar-date-range class="h-5 w-5" />
                <span class="font-medium">{{ $post->created_at->format('d M Y') }}</span>
            </div>
        </div>

        <!-- Judul -->
        <h1 class="font-bold md:text-4xl text-3xl md:text-start text-center text-gray-900 border-b-4 border-yellow-400 pb-6">
            {{ $post->title }}
        </h1>

        <!-- Konten -->
        <div class="prose max-w-none prose-p:my-4 prose-h2:mt-8 prose-h2:mb-4 prose-img:rounded-xl prose-img:my-6">
            {!! $post->content !!}
        </div>

        <!-- Navigasi & Share -->
        <div class="flex items-center justify-between border-t pt-4 border-gray-200">
            <!-- Tombol Navigasi -->
            <div class="flex gap-2">
                <a href="/"
                    class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-black font-semibold rounded-lg shadow hover:bg-yellow-500 transition">
                    <x-heroicon-s-arrow-left class="w-5 h-5" />
                    Kembali
                </a>
            </div>

            <!-- Tombol Share Native -->
            <button id="shareBtn"
                class="flex items-center gap-2 px-4 py-2 bg-yellow-400 text-black font-semibold rounded-lg shadow hover:bg-yellow-500 transition">
                <x-heroicon-s-share class="w-5 h-5" />
                Bagikan
            </button>
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
