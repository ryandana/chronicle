<x-layout>
    <div class="max-w-7xl mx-auto mt-24">

        <h1 class="text-2xl font-bold mb-6">Semua Kategori</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <a href="{{ url('categories/' . $category->slug) }}"
                    class="group rounded-xl border border-gray-200 hover:border-yellow-500 transition-all duration-300 p-5 flex items-center justify-center">

                    <h2 class="text-lg font-bold text-gray-900 group-hover:text-yellow-600 transition">
                        {{ $category->name }}
                    </h2>

                </a>
            @endforeach
        </div>

    </div>
</x-layout>
