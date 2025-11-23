@extends('components.layouts.dashboard')
@section('title', 'Pesan Layanan')
@section('page-title', 'Konfirmasi Pesanan')

@section('content')
<div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Anda akan memesan: {{ $service->name }}</h2>
            <p class="mt-1 text-sm text-gray-600">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
        </header>
        <form method="POST" action="{{ route('order.store') }}" class="mt-6 space-y-6">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">
            <div>
                <label for="notes" class="block font-medium text-sm text-gray-700">Catatan Tambahan (Opsional)</label>
                <textarea id="notes" name="notes" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" placeholder="Contoh: Laptop saya merk A, sering mati sendiri.">{{ old('notes') }}</textarea>
            </div>
            <div class="flex items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3">Konfirmasi Pesanan</button>
                <a href="{{ route('customer.layanan.list') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection