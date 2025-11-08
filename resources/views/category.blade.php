<x-layout>
    <ul class="flex flex-col">
        @foreach ($categories as $category)
            <a class="bg-yell" href="{{ url('categories/' . $category->slug) }}">{{ $category->name }}</a>
        @endforeach
    </ul>
</x-layout>
