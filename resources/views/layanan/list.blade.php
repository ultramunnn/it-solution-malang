@extends('components.layouts.dashboard')

@section('title', 'Daftar Layanan Kami')
@section('page-title', 'Daftar Layanan Kami')

@section('content')
<x-slot name="title">Daftar Layanan Kami</x-slot>
<x-slot name="pageTitle">Daftar Layanan Kami</x-slot>

<div class="mb-6">
    <h2 class="text-3xl font-bold text-grey">Temukan Layanan yang Anda Butuhkan</h2>
    <p class="text-gray-600 mt-2">Kami menyediakan berbagai solusi untuk masalah perangkat Anda. Pilih layanan di bawah ini untuk melihat detailnya.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($services as $service)
    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition-all hover:shadow-xl hover:-translate-y-1">
        @if ($service->image)
        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-48 object-cover">
        @else
        {{-- Placeholder jika tidak ada gambar --}}
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-400">Tidak ada gambar</span>
        </div>
        @endif


        <div class="p-6 flex-grow flex flex-col">
            <h3 class="text-xl font-poppins font-bold text-gray-800 mb-2">{{ $service->name }}</h3>
            <p class="text-gray-600 text-sm mb-4 flex-grow">{{ $service->description }}</p>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
            <p class="text-lg font-semibold text-4">
                Rp {{ number_format($service->price, 0, ',', '.') }}
            </p>
            <a href="#" class="px-4 py-2 bg-4 text-white text-sm font-medium rounded-lg hover:bg-3 transition-colors">
                Pesan Layanan
            </a>
        </div>
    </div>
    @empty
    <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-lg shadow-md">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Layanan</h3>
        <p class="mt-1 text-sm text-gray-500">Saat ini belum ada layanan yang tersedia. Silakan cek kembali nanti.</p>
    </div>
    @endforelse
</div>

{{-- Link Paginasi --}}
<div class="mt-8">
    {{ $services->links() }}
</div>
@endsection
