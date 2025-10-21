{{-- Responsive Navbar Component --}}
<nav id="navbar"
    class="fixed top-0 left-0 w-full bg-white shadow-md z-50 transition-transform duration-500 ease-in-out">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="/"
                class="flex items-center space-x-2 text-xl sm:text-2xl font-bold text-gray-800 hover:text-yellow-500 transition-colors duration-300">
                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <span class="hidden sm:inline">BeritaKita</span>
                <span class="sm:hidden">BK</span>
            </a>

            {{-- Desktop Menu --}}
            <ul class="hidden lg:flex items-center space-x-1 xl:space-x-2">
                <li>
                    <a href="/"
                        class="px-3 xl:px-4 py-2 rounded-lg text-sm xl:text-base font-medium text-gray-700 hover:text-yellow-500 hover:bg-yellow-50 transition-all duration-300">
                        Beranda
                    </a>
                </li>
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ url('categories/' . $category->category->slug) }}"
                            class="px-3 xl:px-4 py-2 rounded-lg text-sm xl:text-base font-medium text-gray-700 hover:text-yellow-500 hover:bg-yellow-50 transition-all duration-300">
                            {{ $category->category->name }}
                        </a>
                    </li>
                @endforeach
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

{{-- JavaScript for Interactivity --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const navbar = document.getElementById('navbar');

        let lastScrollY = window.scrollY;

        // Open mobile menu
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('opacity-0', 'invisible', 'scale-95');
            mobileMenu.classList.add('opacity-100', 'visible', 'scale-100');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });

        // Close mobile menu
        const closeMobileMenu = () => {
            mobileMenu.classList.add('opacity-0', 'invisible', 'scale-95');
            mobileMenu.classList.remove('opacity-100', 'visible', 'scale-100');
            document.body.style.overflow = ''; // Restore scrolling
        };

        closeMenu.addEventListener('click', closeMobileMenu);

        // Close menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Show/hide navbar on scroll
        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;

            if (currentScroll > lastScrollY && currentScroll > 80) {
                navbar.classList.add('-translate-y-full');
            } else {
                navbar.classList.remove('-translate-y-full');
            }

            lastScrollY = currentScroll;
        });

        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('opacity-100')) {
                closeMobileMenu();
            }
        });
    });
</script>

{{-- Optional: Add smooth scroll behavior --}}
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
