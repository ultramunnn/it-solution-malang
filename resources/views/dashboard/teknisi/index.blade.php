<x-layouts.dashboard>
    @section('title', 'Dashboard Teknisi')
    @section('page-title', 'Dashboard Teknisi')

    @section('content')
    <!-- Welcome Card -->
    <div class="mb-6 bg-gradient-to-r from-4 to-3 rounded-xl shadow-lg p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-poppins font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
                <p class="text-2 text-lg">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                <p class="text-white text-sm mt-2 opacity-90">Panel Teknisi - IT Solution Malang</p>
            </div>
            <div class="hidden md:block">
                <svg class="w-24 h-24 opacity-30" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z" />
                </svg>
            </div>
        </div>
    </div>

<!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Chat Card -->
            <a href="{{ route('chat.index') }}"
                class="bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all hover:scale-105 cursor-pointer group block">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-4 to-3 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-poppins font-bold text-grey group-hover:text-4 transition-colors">Chat
                            dengan Customer</h3>
                        <p class="text-sm text-gray-500">Kelola percakapan</p>
                    </div>
                </div>
                <p class="text-gray-600">Chat dengan customer dan berikan bantuan teknis yang mereka butuhkan</p>
            </a>

            <!-- Profile Card -->
            <a href="{{ route('profile.edit') }}"
                class="bg-white rounded-xl shadow-md p-8 hover:shadow-xl transition-all hover:scale-105 cursor-pointer group block">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold text-2xl group-hover:scale-110 transition-transform">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-poppins font-bold text-grey group-hover:text-green-600 transition-colors">Edit
                            Profil Anda</h3>
                        <p class="text-sm text-gray-500">Perbarui informasi akun Anda</p>
                    </div>
                </div>
                <div class="space-y-2 text-gray-600">
                    <p><span class="font-semibold">Nama:</span> {{ auth()->user()->name }}</p>
                    <p><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</p>
                    <p><span class="font-semibold">Role:</span> <span
                            class="inline-block px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Teknisi</span>
                    </p>
                </div>
            </a>
        </div> 

        <!-- Quick Info for Teknisi -->
        <div class="mt-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-6">
            <div class="flex items-start gap-3">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h4 class="font-semibold text-green-900 mb-1">Tugas Anda</h4>
                    <p class="text-green-800 text-sm">Sebagai teknisi, Anda dapat memulai percakapan dengan customer melalui
                        fitur Chat untuk memberikan bantuan dan dukungan teknis.</p>
                </div>
            </div>
        </div>

        <!-- Tips Card -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-blue-500">
                <h5 class="font-semibold text-grey mb-2">💬 Respons Cepat</h5>
                <p class="text-sm text-gray-600">Pastikan untuk merespons customer dengan cepat dan profesional</p>
            </div>
         
            <div class="bg-white rounded-lg p-6 shadow-sm border-l-4 border-orange-500">
                <h5 class="font-semibold text-grey mb-2">✅ Bantuan Lengkap</h5>
                <p class="text-sm text-gray-600">Berikan solusi yang jelas dan mudah dipahami</p>
            </div>
        </div>
        @endsection
</x-layouts.dashboard>
