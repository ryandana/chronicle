<x-layout>
    <div class="max-w-7xl mx-auto mt-24">

        <h1 class="text-2xl font-bold mb-6">Semua Author</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($authors as $author)
                <a href="{{ url('authors/' . $author->username) }}"
                    class="group rounded-xl border border-gray-200 hover:border-yellow-500 transition-all duration-300 p-5 flex flex-col items-center text-center">

                    <img src="{{ asset('storage/' . $author->avatar) }}" class="w-20 h-20 rounded-full object-cover mb-3">

                    <h2 class="text-lg font-bold text-gray-900 group-hover:text-yellow-600 transition">
                        {{ $author->nickname }}
                    </h2>

                    <p class="text-sm text-gray-600">
                        {{ '@' . $author->username }}
                    </p>

                </a>
            @endforeach
        </div>

    </div>
</x-layout>
