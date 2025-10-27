<section id="review" class="bg-slate-100 py-16 sm:py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl font-semibold text-cyan-700 font-['Poppins']">
                Review Pelanggan
            </h2>
            <p class="mt-4 text-lg text-neutral-600">
                Apa kata mereka yang telah menggunakan jasa kami.
            </p>
        </div>
    </div>

    <div x-data="slider" class="mt-16 relative">
        <div x-ref="track" class="flex">
            @php
                $reviews = [
                    [
                        'name' => 'Ahmad Rizki',
                        'review' =>
                            'Pelayanan sangat memuaskan, laptop saya diperbaiki dengan cepat dan hasilnya seperti baru lagi. Recommended!',
                        'avatar' => 'https://i.pravatar.cc/150?u=ahmad',
                    ],
                    [
                        'name' => 'Sari Dewi',
                        'review' =>
                            'Teknisi sangat profesional dan harga terjangkau. MacBook saya kembali normal setelah diperbaiki di sini.',
                        'avatar' => 'https://i.pravatar.cc/150?u=sari',
                    ],
                    [
                        'name' => 'Budi Santoso',
                        'review' =>
                            'Recommended banget! Service cepat, hasil bagus, dan ada garansi. Pasti balik lagi kalau ada masalah.',
                        'avatar' => 'https://i.pravatar.cc/150?u=budi',
                    ],
                    [
                        'name' => 'Rina Amelia',
                        'review' =>
                            'Awalnya ragu, tapi ternyata pengerjaannya sangat transparan. Diberi tahu bagian mana yang rusak dan biayanya jelas.',
                        'avatar' => 'https://i.pravatar.cc/150?u=rina',
                    ],
                    [
                        'name' => 'Joko Prasetyo',
                        'review' =>
                            'Pemasangan CCTV di kantor saya rapi dan cepat. Kualitas gambarnya juga sangat bagus. Terima kasih IT Solution.',
                        'avatar' => 'https://i.pravatar.cc/150?u=joko',
                    ],
                ];
            @endphp

            @foreach ($reviews as $review)
                <div class="slider-item flex-shrink-0 w-80 sm:w-96 p-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 h-full flex flex-col">
                        <div class="flex items-center">
                            <img class="w-12 h-12 rounded-full" src="{{ $review['avatar'] }}"
                                alt="{{ $review['name'] }}">
                            <div class="ml-4">
                                <h3 class="font-semibold text-neutral-800">{{ $review['name'] }}</h3>
                                <div class="flex items-center mt-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-neutral-600 mt-4 text-base flex-grow">"{{ $review['review'] }}"</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .slider-track-animated {
        animation: marquee 40s linear infinite;
    }

    .slider-track-animated:hover {
        animation-play-state: paused;
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            init() {
                const track = this.$refs.track;
                const items = Array.from(track.children);

                // Duplikasi semua item untuk membuat efek infinite loop
                items.forEach(item => {
                    track.appendChild(item.cloneNode(true));
                });

                // Tambahkan kelas animasi setelah duplikasi
                track.classList.add('slider-track-animated');
            }
        }))
    })
</script>
