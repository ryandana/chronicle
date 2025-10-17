<x-layout>
    <swiper-container class="w-full h-[450px] rounded-2xl overflow-hidden mt-24" slides-per-view="1" loop="true"
        autoplay="true" speed="800" space-between="20" pagination="false" navigation="false">
        @foreach ($banners as $banner)
            <swiper-slide>
                <div class="relative w-full h-[450px] rounded-2xl overflow-hidden shadow-lg group">
                    <!-- Image -->
                    <img src="{{ asset('storage/' . $banner->post->thumbnail) }}" alt="{{ $banner->post->title }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <!-- Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

                    <!-- Text -->
                    <div class="absolute bottom-0 left-0 p-6 text-white">
                        <p class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-2">
                            {{ $banner->post->category->name ?? 'Headline' }}
                        </p>
                        <h2 class="text-2xl md:text-4xl font-bold leading-tight drop-shadow-lg mb-3">
                            {{ $banner->post->title }}
                        </h2>
                        <a href="{{ url('/post/' . $banner->post->slug) }}"
                            class="inline-block bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg hover:bg-yellow-300 transition">
                            Read More →
                        </a>
                    </div>
                </div>
            </swiper-slide>
        @endforeach
    </swiper-container>

    <form action="">
        @csrf
        <input type="search" name="search" id="search">
    </form>
    <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 my-24">
        @foreach ($posts as $post)
            <div
                class="group bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden flex flex-col">

                <!-- Thumbnail -->
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                        class="w-full md:h-[200px] h-[250px] object-cover transition-transform duration-700 group-hover:scale-105">
                </div>

                <!-- Content -->
                <div class="p-5 flex flex-col flex-grow justify-between">
                    <div class="flex flex-col space-y-1">
                        <div class="flex md:flex-row flex-col md:items-center items-start gap-2">
                            <!-- Category -->
                            <span
                                class="bg-yellow-400/20 text-yellow-700 rounded-md py-1 px-2 text-xs font-semibold uppercase tracking-wide w-fit">
                                {{ $post->category->name }}
                            </span>
                            <span
                                class="bg-yellow-400/20 text-yellow-700 rounded-md py-1 px-2 text-xs font-semibold uppercase tracking-wide w-fit">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h2 class="text-lg font-bold text-gray-900">
                            {{ $post->title }}
                        </h2>

                        <!-- Description -->
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {!! Str::limit(strip_tags($post->content), 150) !!}
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="mt-5 flex items-center justify-between">
                        <a href="{{ url('author/' . $post->author->username) }}" class="flex items-center gap-2">
                            <img class="rounded-full h-7 w-7 object-cover"
                                src="{{ asset('storage/' . $post->author->avatar) }}"
                                alt="{{ $post->author->nickname }}">
                            <span class="text-sm font-medium text-gray-700">{{ $post->author->nickname }}</span>
                        </a>

                        <a href="{{ url('post/' . $post->slug) }}"
                            class="bg-yellow-400 hover:bg-yellow-300 text-black text-sm font-semibold px-3 py-1.5 rounded-lg transition">
                            Lebih Lanjut &raquo;
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}

</x-layout>
