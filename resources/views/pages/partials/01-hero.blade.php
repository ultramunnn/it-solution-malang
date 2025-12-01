<!-- Navbar -->
<header x-data="{ scrolled: false, open: false }"
        :class="scrolled ? 'bg-white shadow-md text-gray-800' : 'bg-transparent text-white'"
        @scroll.window="scrolled = (window.pageYOffset > 50)"
        class="fixed top-0 left-0 w-full z-50 py-6 transition-colors duration-300">
    
    <nav class="flex justify-between items-center px-4 sm:px-16">
        <a href="#"><img class="h-10 sm:h-12 w-auto" src="{{ asset('assets/images/logo.png') }}" alt="Logo" /></a>
        
        <div class="hidden md:flex items-center gap-10 font-semibold text-lg">
            <a href="#hero" class="hover:text-2 transition">Home</a>
            <a href="{{ route('login') }}" class="hover:text-2 transition">Login
                
            </a>
            <a href="#kontak" class="hover:text-2 transition">Kontak Kami</a>
            <a href="#kontak" class="hover:text-2 transition">Location</a>
        </div>

        <!-- Hamburger -->
        <div class="md:hidden">
            <button @click="open = !open" class="relative z-50">
                <!-- Menu -->
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Close -->
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden absolute top-full left-0 w-full bg-gray-800/70 backdrop-blur-sm shadow-lg">
        <div class="flex flex-col items-start px-8 gap-6 py-8 font-semibold text-lg text-white">
            <a href="#hero" class="hover:text-gray-300 transition">Home</a>
            <a href="#" class="hover:text-gray-300 transition">Status Service</a>
            <a href="#" class="hover:text-gray-300 transition">Kontak Kami</a>
            <a href="#" class="hover:text-gray-300 transition">Location</a>
        </div>
    </div>
</header>


<!-- Hero Section -->
<section id="hero" class="relative w-full h-screen overflow-hidden pt-24"
    :class="scrolled ? 'bg-1 shadow-md text-black' : 'bg-transparent text-1'">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/bg-hero.png') }}" alt="Background" class="object-cover w-full h-full" />
        <div class="absolute inset-0 bg-4/70"></div>
    </div>

    <div class="relative flex flex-col h-full xl:min-w-screen xl:px-16 mx-auto px-4 sm:px-6 lg:px-8">
        <main class="flex-grow flex flex-col justify-center">
            <div class="max-w-3xl">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-semibold text-white font-Poppins">
                    Solusi Cepat dan Terpercaya untuk Service Laptop & Komputer Anda di Malang
                </h1>
                <p class="mt-6 text-lg sm:text-xl md:text-2xl text-1 font-light font-Inter">
                    Kami melayani perbaikan profesional, penjualan spare parts, jual beli laptop, hingga pemasangan
                    CCTV.
                </p>

                <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    <a href="{{ route('login') }}"
                        class="bg-second text-grey text-center hover:text-3 font-semibold text-base sm:text-lg px-6 py-3 sm:px-8 sm:py-4 rounded-xl hover:bg-primary-300 transition-colors duration-300 w-63">
                        Lacak Status Service
                    </a>
                    <a href="https://wa.me/6285724252421"
                        class="bg-second text-center  text-grey hover:text-3 font-semibold text-base sm:text-lg px-6 py-3 sm:px-8 sm:py-4 rounded-xl hover:bg-primary-300 transition-colors duration-300 w-63">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </main>
    </div>
</section>
