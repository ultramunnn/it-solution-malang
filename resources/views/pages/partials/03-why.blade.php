<section id="why" class="bg-gray-50 py-24 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">

            <div class="w-full hidden lg:block">
                <img class="w-full h-auto object-cover " src="{{ asset('assets/images/why.png') }}"
                    alt="Teknisi IT Solution Malang sedang bekerja" />
            </div>

            <div class="flex flex-col">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-4 font-Poppins">
                    Mengapa Harus Kami?
                </h2>
                <p class="mt-6 text-base sm:text-lg text-grey leading-relaxed">
                    IT Solution Malang merupakan jasa service laptop & komputer yang terpercaya dan bergaransi.
                </p>

                <div x-data="{ openAccordion: 1 }" class="mt-8 space-y-4">
                    <div>
                        <h2>
                            <button @click="openAccordion = (openAccordion === 1 ? null : 1)" type="button"
                                class="flex items-center justify-between w-full p-4 sm:p-5 font-semibold text-left bg-primary-100 text-grey  hover:bg-primary-300 rounded-lg bg-second">
                                <span class="text-base lg:text-lg">Proses Perbaikan Cepat</span> <svg
                                    class="w-5 h-5 transform transition-transform duration-300"
                                    :class="{ 'rotate-180': openAccordion === 1 }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </h2>
                        <div x-show="openAccordion === 1" x-collapse class="p-4 sm:p-5 bg-second/60 rounded-b-lg">
                            <p class="text-sm sm:text-base text-neutral-600">
                                Proses service dan reparasi di IT Solution Malang itu cepat, antara 2-3 hari, dan gratis
                                dalam pengecekan awal unit device Anda.
                            </p>
                        </div>
                    </div>

                    <div>
                        <h2>
                            <button @click="openAccordion = (openAccordion === 2 ? null : 2)" type="button"
                                class="flex items-center justify-between w-full p-4 sm:p-5 font-semibold text-left bg-primary-100 text-grey bg-second hover:bg-primary-300 rounded-lg">
                                <span class="text-base lg:text-lg">Teknisi Ahli Berpengalaman</span> <svg
                                    class="w-5 h-5 transform transition-transform duration-300"
                                    :class="{ 'rotate-180': openAccordion === 2 }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </h2>
                        <div x-show="openAccordion === 2" x-collapse class="p-4 sm:p-5 bg-second/60 rounded-b-lg">
                            <p class="text-sm sm:text-base text-neutral-600">
                                Tim kami terdiri dari teknisi ahli yang sudah berpengalaman bertahun-tahun dalam
                                menangani berbagai kerusakan hardware dan software.
                            </p>
                        </div>
                    </div>

                    <div>
                        <h2>
                            <button @click="openAccordion = (openAccordion === 3 ? null : 3)" type="button"
                                class="flex items-center justify-between w-full p-4 sm:p-5 font-semibold text-left bg-primary-100 text-grey bg-second hover:bg-primary-300 rounded-lg">
                                <span class="text-base lg:text-lg">Bergaransi</span> <svg
                                    class="w-5 h-5 transform transition-transform duration-300"
                                    :class="{ 'rotate-180': openAccordion === 3 }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </h2>
                        <div x-show="openAccordion === 3" x-collapse class="p-4 sm:p-5 bg-second/60 rounded-b-lg">
                            <p class="text-sm sm:text-base text-neutral-600">
                                Setiap layanan perbaikan dari kami disertai dengan garansi, memberikan Anda ketenangan
                                dan jaminan kualitas.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
