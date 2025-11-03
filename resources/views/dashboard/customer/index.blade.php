<x-layouts.dashboard>
    @section('title', 'Dashboard Customer')
    @section('page-title', 'Dashboard Customer')

    @section('content')
        <!-- Welcome Card -->
        <div class="mb-6 bg-gradient-to-r from-4 to-3 rounded-xl shadow-lg p-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-poppins font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
                    <p class="text-2 text-lg">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-24 h-24 opacity-30" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-3.86-.96-7-5.56-7-10V8.3l7-3.11 7 3.11V10c0 4.44-3.14 9.04-7 10z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Chat Card -->
            <a href="{{ route('chat.index') }}"
                class="bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all hover:scale-105 cursor-pointer group">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-4 to-3 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-poppins font-bold text-grey group-hover:text-4 transition-colors">Chat</h3>
                        <p class="text-sm text-gray-500">Hubungi teknisi kami</p>
                    </div>
                </div>
                <p class="text-gray-600">Chat teknisi untuk bertanya tentang masalah sofware maupun hardware yang anda alami
                </p>
            </a>

            <!-- Profile Card -->
            <div
                class="bg-white rounded-xl shadow-md p-8  hover:shadow-xl transition-all hover:scale-105 cursor-pointer group">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-poppins font-bold text-grey">Profil Anda</h3>
                        <p class="text-sm text-gray-500">Informasi akun</p>
                    </div>
                </div>
                <div class="space-y-2 text-gray-600">
                    <p><span class="font-semibold">Nama:</span> {{ auth()->user()->name }}</p>
                    <p><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</p>
                    <p><span class="font-semibold">Role:</span> <span
                            class="inline-block px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Customer</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Quick Info -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-6">
            <div class="flex items-start gap-3">
                <svg class="w-6 h-6 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="font-semibold text-blue-900 mb-1">Butuh Bantuan?</h4>
                    <p class="text-blue-800 text-sm">Klik menu Chat, pilih teknisi yang tersedia, dan mulai percakapan untuk
                        mendapatkan bantuan teknis.</p>
                </div>
            </div>
        </div>
    @endsection
</x-layouts.dashboard>
