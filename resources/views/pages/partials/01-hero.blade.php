<section class="relative w-full h-screen overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('assets/images/bg-hero.png') }}" alt="Background Bengkel IT Solution Malang"
            class="object-cover w-full h-full" />
        <div class="absolute inset-0 bg-4/70"></div>
    </div>

    <div class="relative flex flex-col h-full xl:min-w-screen xl:px-16 mx-auto px-4 sm:px-6 lg:px-8">

        <header x-data="{ open: false }" class="py-6"> <nav class="flex justify-between items-center">
                <a href="#">
                    <img class="h-10 sm:h-12 w-auto" src="{{ asset('assets/images/logo.png') }}"
                        alt="IT Solution Malang Logo" />
                </a>

                <div class="hidden md:flex items-center gap-10 text-neutral-100 font-semibold font-Poppins text-lg">
                    <a href="#" class="hover:text-2 transition">Home</a>
                    <a href="#" class="hover:text-2 transition">Status Service</a>
                    <a href="#" class="hover:text-2 transition">Kontak Kami</a>
                    <a href="#" class="hover:text-2 transition">Location</a>
                </div>

                <div class="md:hidden">
                    <button @click="open = !open" class="text-white z-50 relative">
                        <svg x-show="!open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg x-show="open" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <div x-show="open" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-4"
                 class="md:hidden absolute top-0 left-0 w-full bg-4/60 backdrop-blur-sm mt-24 shadow-lg"
                 @click.away="open = false" style="display: none;">
                <div class="flex flex-col items-start px-8 gap-6 py-8 text-neutral-100 font-semibold font-Poppins text-lg">
                    <a href="#" class="hover:text-2 transition">Home</a>
                    <a href="#" class="hover:text-2 transition">Status Service</a>
                    <a href="#" class="hover:text-2 transition">Kontak Kami</a>
                    <a href="#" class="hover:text-2 transition">Location</a>
                </div>
            </div>
        </header>

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
                    <a href="#"
                        class="bg-second text-grey text-center hover:text-3 font-semibold text-base sm:text-lg px-6 py-3 sm:px-8 sm:py-4 rounded-xl hover:bg-primary-300 transition-colors duration-300 w-63">
                        Lacak Status Service
                    </a>
                    <a href="#"
                        class="bg-second text-center  text-grey hover:text-3 font-semibold text-base sm:text-lg px-6 py-3 sm:px-8 sm:py-4 rounded-xl hover:bg-primary-300 transition-colors duration-300 w-63" >
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </main>
    </div>
</section>