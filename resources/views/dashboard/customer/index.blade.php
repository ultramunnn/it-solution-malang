@extends('components.layouts.dashboard')

@section('title', 'Dashboard Customer')
@section('page-title', 'Dashboard')

@section('content')
    <div class="space-y-6">

        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-3 to-4 rounded-lg shadow-lg p-6 text-white">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-poppins font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
                    <p class="text-white/90">Kelola pesanan service IT Anda dengan mudah</p>
                </div>
                <a href="#"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-white text-3 rounded-lg hover:bg-gray-100 transition-colors font-medium shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Order Baru
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Order -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Total Order</p>
                        <p class="text-3xl font-bold text-grey">12</p>
                        <p class="text-xs text-green-600 mt-1">+2 bulan ini</p>
                    </div>
                    <div class="w-14 h-14 bg-3/10 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Dalam Proses -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Dalam Proses</p>
                        <p class="text-3xl font-bold text-grey">3</p>
                        <p class="text-xs text-blue-600 mt-1">Sedang dikerjakan</p>
                    </div>
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Selesai -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Selesai</p>
                        <p class="text-3xl font-bold text-grey">8</p>
                        <p class="text-xs text-green-600 mt-1">Berhasil diselesaikan</p>
                    </div>
                    <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Total Pengeluaran</p>
                        <p class="text-3xl font-bold text-grey">2.4M</p>
                        <p class="text-xs text-gray-500 mt-1">Rp 2.400.000</p>
                    </div>
                    <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center">
                        <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Aktif & Layanan Populer -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Order Aktif (2 kolom) -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-poppins font-bold text-grey">Order Aktif</h2>
                    <a href="#" class="text-sm text-3 hover:text-4 font-medium">Lihat Semua →</a>
                </div>

                <div class="p-6 space-y-4">
                    <!-- Order Item 1 -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm font-mono font-medium text-grey">ORD-2024-001</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Sedang
                                        Dikerjakan</span>
                                </div>
                                <h3 class="font-semibold text-grey mb-1">Service Laptop Gaming</h3>
                                <p class="text-sm text-gray-600 mb-2">Laptop lemot, sering ngelag saat gaming</p>
                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        2 Nov 2024
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Teknisi: Budi
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Total</p>
                                <p class="text-xl font-bold text-3">Rp 350.000</p>
                                <button
                                    class="mt-2 text-sm text-3 hover:text-4 font-medium flex items-center gap-1 ml-auto">
                                    Detail
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 2 -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm font-mono font-medium text-grey">ORD-2024-002</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                                </div>
                                <h3 class="font-semibold text-grey mb-1">Instalasi CCTV 4 Channel</h3>
                                <p class="text-sm text-gray-600 mb-2">Instalasi CCTV untuk rumah</p>
                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        1 Nov 2024
                                    </span>
                                    <span class="text-yellow-600">● Menunggu teknisi</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Total</p>
                                <p class="text-xl font-bold text-3">Rp 1.200.000</p>
                                <button
                                    class="mt-2 text-sm text-3 hover:text-4 font-medium flex items-center gap-1 ml-auto">
                                    Detail
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 3 -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-sm font-mono font-medium text-grey">ORD-2024-003</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">Dikirim</span>
                                </div>
                                <h3 class="font-semibold text-grey mb-1">Perbaikan LCD iPhone</h3>
                                <p class="text-sm text-gray-600 mb-2">LCD retak, perlu diganti</p>
                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        30 Okt 2024
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                        </svg>
                                        Resi: JNE123456789
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 mb-1">Total</p>
                                <p class="text-xl font-bold text-3">Rp 850.000</p>
                                <button
                                    class="mt-2 text-sm text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1 ml-auto">
                                    Lacak Paket
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layanan Populer (1 kolom) -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-poppins font-bold text-grey">Layanan Populer</h2>
                </div>

                <div class="p-4 space-y-3">
                    <!-- Service Item 1 -->
                    <div class="border border-gray-200 rounded-lg p-3 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-gradient-to-br from-2 to-3 rounded-lg flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-grey mb-1 truncate">Service Laptop</h4>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2">Cleaning, install ulang, upgrade</p>
                                <p class="text-sm font-bold text-3">Rp 150.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Item 2 -->
                    <div class="border border-gray-200 rounded-lg p-3 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-gradient-to-br from-2 to-3 rounded-lg flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-grey mb-1 truncate">Perbaikan HP</h4>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2">Ganti LCD, baterai, software</p>
                                <p class="text-sm font-bold text-3">Rp 200.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Item 3 -->
                    <div class="border border-gray-200 rounded-lg p-3 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-gradient-to-br from-2 to-3 rounded-lg flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-grey mb-1 truncate">Instalasi CCTV</h4>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2">4-8 channel, garansi 1 tahun</p>
                                <p class="text-sm font-bold text-3">Rp 1.000.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Item 4 -->
                    <div class="border border-gray-200 rounded-lg p-3 hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-gradient-to-br from-2 to-3 rounded-lg flex-shrink-0"></div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-sm text-grey mb-1 truncate">Rakit PC</h4>
                                <p class="text-xs text-gray-600 mb-2 line-clamp-2">Custom spec sesuai kebutuhan</p>
                                <p class="text-sm font-bold text-3">Rp 300.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Button Browse More -->
                    <a href="#"
                        class="block w-full text-center py-3 bg-gray-50 hover:bg-gray-100 text-3 font-medium rounded-lg transition-colors">
                        Lihat Semua Layanan →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-poppins font-bold text-grey mb-4">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#"
                    class="flex flex-col items-center gap-3 p-4 bg-gradient-to-br from-3/10 to-4/10 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-3 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-grey text-center">Order Baru</span>
                </a>

                <a href="#"
                    class="flex flex-col items-center gap-3 p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-grey text-center">History Order</span>
                </a>

                <a href="#"
                    class="flex flex-col items-center gap-3 p-4 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-grey text-center">Beri Review</span>
                </a>

                <a href="#"
                    class="flex flex-col items-center gap-3 p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg hover:shadow-md transition-all group">
                    <div
                        class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-grey text-center">Bantuan</span>
                </a>
            </div>
        </div>

    </div>
@endsection
