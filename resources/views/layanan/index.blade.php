@extends('components.layouts.dashboard')

@section('title', 'Kelola Layanan')
@section('page-title', 'Kelola Layanan')

@section('content')
    <div class="space-y-6">

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-poppins font-bold text-grey">Daftar Layanan</h1>
                <p class="text-sm text-gray-600 mt-1">Kelola semua layanan IT yang Anda tawarkan</p>
            </div>
            <a href="{{ route('layanan.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-3 text-white rounded-lg hover:bg-4 transition-colors font-medium shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Layanan
            </a>
        </div>

        <!-- Stats Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-3/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-gray-600 text-sm">Total Layanan</p>
                    <p class="text-2xl font-bold text-grey">{{ $service->count() }}</p>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        @if ($service->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="w-24 h-24 bg-2/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-xl font-poppins font-bold text-grey mb-2">Belum Ada Layanan</h3>
                <p class="text-gray-600 mb-6">Mulai tambahkan layanan IT yang Anda tawarkan</p>
                <a href="{{ route('layanan.create') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-3 text-white rounded-lg hover:bg-4 transition-colors font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Layanan Pertama
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($service as $layanan)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
                        <!-- Image -->
                        <div class="relative h-48 bg-gradient-to-br from-2 to-3 overflow-hidden">
                            @if ($layanan->image)
                                <img src="{{ asset('storage/' . $layanan->image) }}" alt="{{ $layanan->title }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <h3 class="text-lg font-poppins font-bold text-grey mb-2 truncate">{{ $layanan->title }}</h3>
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $layanan->description }}</p>

                            <!-- Price & Duration -->
                            <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
                                <div>
                                    <p class="text-xs text-gray-500">Harga</p>
                                    <p class="text-lg font-bold text-3">Rp {{ number_format($layanan->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">Durasi</p>
                                    <p class="text-sm font-medium text-grey">{{ $layanan->duration_estimate }}</p>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-2">
                                <a href="{{ route('layanan.edit', $layanan) }}"
                                    class="flex-1 flex items-center justify-center gap-2 px-3 py-2 bg-second text-grey rounded-lg hover:bg-yellow-400 transition-colors text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('layanan.destroy', $layanan) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex items-center justify-center gap-2 px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors text-sm font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
