<x-layouts.dashboard>

    @section('title', 'Dashboard Teknisi')
    @section('page-title', 'Dashboard Teknisi')

    @section('content')
        <!-- Welcome Card -->
        <div class="mb-6 bg-gradient-to-r from-4 to-3 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-poppins font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
                    <p class="text-2 text-sm">{{ now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
                    <p class="text-white text-sm mt-1 opacity-90">Anda memiliki <span class="font-bold">3 order</span> yang perlu ditangani hari ini</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-20 h-20 opacity-30" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-3.86-.96-7-5.56-7-10V8.3l7-3.11 7 3.11V10c0 4.44-3.14 9.04-7 10z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Order -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-grey text-sm font-medium mb-1">Total Order</p>
                        <h3 class="text-3xl font-poppins font-bold text-4">24</h3>
                        <p class="text-xs text-3 mt-2">+3 dari minggu lalu</p>
                    </div>
                    <div class="w-12 h-12 bg-4 bg-opacity-10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Barang Diterima (Arrived) -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-grey text-sm font-medium mb-1">Barang Diterima</p>
                        <h3 class="text-3xl font-poppins font-bold text-3">5</h3>
                        <p class="text-xs text-3 mt-2">Siap dikerjakan</p>
                    </div>
                    <div class="w-12 h-12 bg-3 bg-opacity-10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Dalam Perbaikan (In Progress) -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-grey text-sm font-medium mb-1">Dalam Perbaikan</p>
                        <h3 class="text-3xl font-poppins font-bold" style="color: #f59e0b;">3</h3>
                        <p class="text-xs mt-2" style="color: #f59e0b;">Sedang dikerjakan</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(245, 158, 11, 0.1);">
                        <svg class="w-6 h-6" style="color: #f59e0b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Selesai Bulan Ini (Completed) -->
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow cursor-pointer">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-grey text-sm font-medium mb-1">Selesai</p>
                        <h3 class="text-3xl font-poppins font-bold" style="color: #10b981;">16</h3>
                        <p class="text-xs mt-2" style="color: #10b981;">Bulan ini</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background-color: rgba(16, 185, 129, 0.1);">
                        <svg class="w-6 h-6" style="color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Status -->
        <div class="mb-6 bg-white rounded-xl shadow-md p-4">
            <div class="flex items-center gap-4 overflow-x-auto">
                <span class="text-grey font-medium text-sm whitespace-nowrap">Filter Status:</span>
                <button class="px-4 py-2 bg-4 text-white rounded-lg text-sm font-medium hover:bg-3 transition-colors whitespace-nowrap">
                    Semua
                </button>
                <button class="px-4 py-2 bg-1 text-grey rounded-lg text-sm font-medium hover:bg-2 transition-colors whitespace-nowrap">
                    Barang Diterima
                </button>
                <button class="px-4 py-2 bg-1 text-grey rounded-lg text-sm font-medium hover:bg-2 transition-colors whitespace-nowrap">
                    Dalam Perbaikan
                </button>
                <button class="px-4 py-2 bg-1 text-grey rounded-lg text-sm font-medium hover:bg-2 transition-colors whitespace-nowrap">
                    Menunggu Pickup
                </button>
                <button class="px-4 py-2 bg-1 text-grey rounded-lg text-sm font-medium hover:bg-2 transition-colors whitespace-nowrap">
                    Selesai
                </button>
            </div>
        </div>

        <!-- Recent Orders & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Orders -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-1 flex items-center justify-between">
                    <h2 class="text-lg font-poppins font-bold text-grey">Order Terbaru</h2>
                    <div class="flex items-center gap-2">
                        <input type="text" placeholder="Cari order..."
                            class="px-3 py-1 text-sm border border-1 rounded-lg focus:outline-none focus:border-3">
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Order Item 1 - Arrived -->
                        <div class="flex items-start gap-4 p-4 bg-1 rounded-lg hover:bg-2 hover:bg-opacity-20 transition-colors cursor-pointer border-l-4 border-3">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-3 rounded-lg flex items-center justify-center text-white font-bold">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-4">#ORD-2025-001</span>
                                            <span class="px-2 py-0.5 bg-3 bg-opacity-10 text-3 text-xs rounded-md font-medium">Barang Diterima</span>
                                        </div>
                                        <h4 class="font-semibold text-grey">Service Laptop Asus ROG</h4>
                                        <p class="text-sm text-grey opacity-70 mt-1">Customer: Budi Santoso</p>
                                        <p class="text-xs text-grey opacity-60 mt-1">Masalah: Laptop mati total, tidak bisa booting</p>
                                    </div>
                                    <button class="px-3 py-1 bg-4 hover:bg-3 text-white text-xs rounded-lg transition-colors font-medium">
                                        Mulai Perbaikan
                                    </button>
                                </div>
                                <div class="flex items-center gap-4 mt-3 text-xs">
                                    <div class="flex items-center gap-1 text-grey opacity-70">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>3 jam yang lalu</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-grey opacity-70">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        <span>JNE - 1234567890</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Item 2 - In Progress -->
                        <div class="flex items-start gap-4 p-4 bg-1 rounded-lg hover:bg-2 hover:bg-opacity-20 transition-colors cursor-pointer border-l-4" style="border-color: #f59e0b;">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white font-bold" style="background-color: #f59e0b;">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-4">#ORD-2025-002</span>
                                            <span class="px-2 py-0.5 text-xs rounded-md font-medium" style="background-color: rgba(245, 158, 11, 0.1); color: #f59e0b;">Dalam Perbaikan</span>
                                        </div>
                                        <h4 class="font-semibold text-grey">Perbaikan iPhone 12 Pro</h4>
                                        <p class="text-sm text-grey opacity-70 mt-1">Customer: Siti Aminah</p>
                                        <p class="text-xs text-grey opacity-60 mt-1">Masalah: Layar pecah dan baterai boros</p>
                                    </div>
                                    <button class="px-3 py-1 text-xs rounded-lg transition-colors font-medium" style="background-color: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                                        Update Progress
                                    </button>
                                </div>
                                <div class="flex items-center gap-4 mt-3 text-xs">
                                    <div class="flex items-center gap-1 text-grey opacity-70">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Dikerjakan sejak 2 hari lalu</span>
                                    </div>
                                    <div class="flex items-center gap-1" style="color: #f59e0b;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                        <span>Progress: 60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Item 3 - Shipped -->
                        <div class="flex items-start gap-4 p-4 bg-1 rounded-lg hover:bg-2 hover:bg-opacity-20 transition-colors cursor-pointer border-l-4 border-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-4 rounded-lg flex items-center justify-center text-white font-bold">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-4">#ORD-2025-003</span>
                                            <span class="px-2 py-0.5 bg-4 bg-opacity-10 text-4 text-xs rounded-md font-medium">Dikirim ke Customer</span>
                                        </div>
                                        <h4 class="font-semibold text-grey">Service Komputer PC Gaming</h4>
                                        <p class="text-sm text-grey opacity-70 mt-1">Customer: Ahmad Rizki</p>
                                        <p class="text-xs text-grey opacity-60 mt-1">Perbaikan: Ganti VGA & upgrade RAM 32GB</p>
                                    </div>
                                    <span class="px-3 py-1 text-xs rounded-lg font-medium" style="background-color: rgba(16, 185, 129, 0.1); color: #10b981;">
                                        Selesai
                                    </span>
                                </div>
                                <div class="flex items-center gap-4 mt-3 text-xs">
                                    <div class="flex items-center gap-1 text-grey opacity-70">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Dikirim 1 hari lalu</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-grey opacity-70">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        <span>SiCepat - 0987654321</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="#" class="block text-center py-2 text-3 hover:text-4 font-medium transition-colors">
                            Lihat Semua Order →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Info -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-1">
                        <h2 class="text-lg font-poppins font-bold text-grey">Aksi Cepat</h2>
                    </div>
                    <div class="p-6 space-y-3">
                        <button class="w-full flex items-center gap-3 px-4 py-3 bg-4 hover:bg-3 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="font-medium">Lihat Semua Order</span>
                        </button>

                        <button class="w-full flex items-center gap-3 px-4 py-3 bg-1 hover:bg-2 text-grey rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="font-medium">Tambah Layanan</span>
                        </button>

                        <button class="w-full flex items-center gap-3 px-4 py-3 bg-1 hover:bg-2 text-grey rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="font-medium">Riwayat Perbaikan</span>
                        </button>

                        <button class="w-full flex items-center gap-3 px-4 py-3 bg-1 hover:bg-2 text-grey rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Laporan & Statistik</span>
                        </button>
                    </div>
                </div>

                <!-- Statistik Performa -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-1">
                        <h2 class="text-lg font-poppins font-bold text-grey">Performa Bulan Ini</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Rata-rata Waktu Perbaikan -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-grey">Rata-rata Waktu Perbaikan</span>
                                <span class="text-sm font-bold text-4">2.5 hari</span>
                            </div>
                            <div class="w-full bg-1 rounded-full h-2">
                                <div class="bg-3 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>

                        <!-- Tingkat Kepuasan -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-grey">Tingkat Kepuasan</span>
                                <span class="text-sm font-bold" style="color: #10b981;">4.8/5.0</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" style="color: #fbbf24;" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4" style="color: #fbbf24;" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4" style="color: #fbbf24;" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4" style="color: #fbbf24;" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg class="w-4 h-4 text-grey opacity-30" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-xs text-grey opacity-70 ml-2">dari 12 review</span>
                            </div>
                        </div>

                        <!-- Order Selesai -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-grey">Target Order Selesai</span>
                                <span class="text-sm font-bold text-3">16/20</span>
                            </div>
                            <div class="w-full bg-1 rounded-full h-2">
                                <div class="bg-gradient-to-r from-3 to-4 h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="bg-gradient-to-br from-2 to-3 rounded-xl shadow-md p-6 text-white">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl font-bold text-4">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div>
                            <h3 class="font-poppins font-bold">{{ auth()->user()->name }}</h3>
                            <p class="text-sm opacity-90">Teknisi IT Solution</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="opacity-90 text-xs truncate">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="opacity-90">Jam Kerja: 08:00 - 17:00</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="opacity-90">Status: Aktif</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white border-opacity-20">
                        <div class="flex items-center justify-between text-xs">
                            <span class="opacity-80">Member sejak</span>
                            <span class="font-semibold">{{ auth()->user()->created_at->format('M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-layouts.dashboard>
