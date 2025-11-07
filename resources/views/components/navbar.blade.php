{{-- Responsive Navbar Component --}}
<nav id="navbar"
    class="fixed top-0 left-0 w-full bg-white shadow-md z-50 transition-transform duration-500 ease-in-out">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="/"
                class="flex items-center space-x-2 text-xl sm:text-2xl font-bold text-gray-800 hover:text-yellow-500 transition-colors duration-300">
                <span class="inline">Chronicle</span>
            </a>

            {{-- Desktop Menu --}}
            <ul class="hidden lg:flex items-center space-x-1 xl:space-x-2">
                {{-- <li>
                    <a href="/" wire:navigate.hover
                        class="px-3 xl:px-4 py-2 rounded-lg text-sm xl:text-base font-medium text-gray-700 hover:text-yellow-500 hover:bg-yellow-50 transition-all duration-300">
                        Beranda
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('categories/' . $category->category->slug) }}" wire:navigate
                            class="px-3 xl:px-4 py-2 rounded-lg text-sm xl:text-base font-medium text-gray-700 hover:text-yellow-500 hover:bg-yellow-50 transition-all duration-300">
                            {{ $category->category->name }}
                        </a>
                    </li>
                @endforeach --}}
            </ul>

            {{-- Mobile Menu Button --}}
            <button id="menu-toggle"
                class="lg:hidden p-2 rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-colors duration-300">
                <svg id="menu-icon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Fullscreen Overlay --}}
    <div id="mobile-menu"
        class="fixed inset-0 bg-gradient-to-br from-yellow-400 via-yellow-500 to-orange-400 flex flex-col items-center justify-center z-[9999] opacity-0 invisible transition-all duration-500 ease-in-out transform scale-95">

        {{-- Close Button --}}
        <button id="close-menu"
            class="absolute top-6 right-6 p-2 rounded-full text-white hover:bg-white hover:bg-opacity-20 focus:outline-none transition-all duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        {{-- Mobile Menu Items --}}
        <div class="flex flex-col items-center space-y-6 text-center">
            <a href="/"
                class="text-2xl sm:text-3xl font-bold text-white hover:text-gray-800 transform hover:scale-110 transition-all duration-300">
                Beranda
            </a>
            @foreach ($categories as $category)
                <a href="{{ url('categories/' . $category->category->slug) }}"
                    class="text-2xl sm:text-3xl font-bold text-white hover:text-gray-800 transform hover:scale-110 transition-all duration-300">
                    {{ $category->category->name }}
                </a>
            @endforeach
        </div>

        {{-- Decorative Elements --}}
        <div class="absolute bottom-8 text-white text-sm font-medium opacity-75">
            Pilih Kategori
        </div>
    </div>
</nav>
