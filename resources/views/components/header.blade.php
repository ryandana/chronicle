<header class="absolute top-0 left-0 w-full z-50 bg-white shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="/" wire:navigate class="text-3xl font-extrabold text-yellow-600">
            Chronicle
        </a>

        <nav class="hidden md:flex gap-8 text-base font-medium text-yellow-600">
            <a href="/" wire:navigate class="hover:text-yellow-700 transition">Home</a>
            <a href="/posts" wire:navigate class="hover:text-yellow-700 transition">Posts</a>
            <a href="/categories" wire:navigate class="hover:text-yellow-700 transition">Categories</a>
            <a href="/about" wire:navigate class="hover:text-yellow-700 transition">About</a>
        </nav>

        <button @click="open = true" class="md:hidden text-yellow-600 text-3xl">
            ☰
        </button>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed inset-0 bg-white flex flex-col z-50 md:hidden">

        <div class="flex justify-end p-6">
            <button @click="open = false" class="text-4xl text-yellow-600">
                &times;
            </button>
        </div>

        <div class="flex flex-col items-center justify-center flex-grow gap-6 text-2xl font-semibold text-yellow-600">
            <a href="/" wire:navigate @click="open = false" class="hover:text-yellow-700 transition">Home</a>
            <a href="/posts" wire:navigate @click="open = false" class="hover:text-yellow-700 transition">Posts</a>
            <a href="/categories" wire:navigate @click="open = false" class="hover:text-yellow-700 transition">Categories</a>
            <a href="/about" wire:navigate @click="open = false" class="hover:text-yellow-700 transition">About</a>
        </div>
    </div>
</header>
