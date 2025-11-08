<footer class="bg-gray-100 text-yellow-700 py-12 mt-14">
    <div class="max-w-7xl mx-auto px-6">

        {{-- Top Section --}}
        <div class="flex flex-col md:flex-row justify-between gap-10">

            {{-- Brand + Description --}}
            <div class="md:w-1/3">
                <h2 class="text-4xl font-semibold mb-3 tracking-tight">
                    Chronicle
                </h2>
                <p class="text-base text-yellow-700/80 leading-relaxed">
                    Chronicle is your curated space for stories, insights, and discoveries.
                    Crafted with clarity and purpose — made to inspire every reader.
                </p>
            </div>

            {{-- Navigation --}}
            <div class="flex flex-wrap md:flex-nowrap md:justify-end gap-14 md:gap-20">

                <div>
                    <h3 class="text-lg font-semibold mb-3">Explore</h3>
                    <ul class="space-y-2 text-base">
                        <li><a href="/" class="hover:text-yellow-600 transition">Home</a></li>
                        <li><a href="/posts" class="hover:text-yellow-600 transition">Posts</a></li>
                        <li><a href="/categories" class="hover:text-yellow-600 transition">Categories</a></li>
                        <li><a href="/about" class="hover:text-yellow-600 transition">About</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-3">Support</h3>
                    <ul class="space-y-2 text-base">
                        <li><a href="#" class="hover:text-yellow-600 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-yellow-600 transition">Privacy</a></li>
                        <li><a href="#" class="hover:text-yellow-600 transition">Terms</a></li>
                        <li><a href="#" class="hover:text-yellow-600 transition">FAQ</a></li>
                    </ul>
                </div>

            </div>

        </div>

        {{-- Divider --}}
        <div class="border-t border-yellow-700/20 my-10"></div>

        {{-- Bottom Section --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm font-medium text-yellow-700/80">
                © {{ date('Y') }} Chronicle — All rights reserved.
            </p>

            <p class="text-sm font-medium text-yellow-700/80">
                Built with clarity and intention.
            </p>
        </div>

    </div>
</footer>
