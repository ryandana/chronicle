<x-layout>
    <swiper-container class="w-full h-[450px] rounded-2xl overflow-hidden mt-24" slides-per-view="1" loop="true"
        wire:ignore autoplay="true" speed="800" space-between="20" pagination="false" navigation="false">

        @foreach ($banners as $banner)
            <swiper-slide>
                <a href="{{ url('/posts/' . $banner->post->slug) }}"
                    class="relative block w-full h-[450px] rounded-2xl overflow-hidden shadow-lg group">
                    <!-- Image -->
                    <img src="{{ asset('storage/' . $banner->post->thumbnail) }}" alt="{{ $banner->post->title }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

                    <!-- Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

                    <!-- Text -->
                    <div class="absolute bottom-0 left-0 p-6 text-white z-10">
                        <p class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-2">
                            {{ $banner->post->category->name ?? 'Headline' }}
                        </p>
                        <h2 class="text-2xl md:text-4xl font-bold leading-tight drop-shadow-lg mb-3">
                            {{ $banner->post->title }}
                        </h2>
                    </div>
                </a>
            </swiper-slide>
        @endforeach
    </swiper-container>
    <livewire:posts-list />
</x-layout>
