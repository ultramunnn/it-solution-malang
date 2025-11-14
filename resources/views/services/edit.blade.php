@extends('components.layouts.dashboard')
@section('title', 'Edit Layanan')
@section('page-title', 'Edit Layanan')

@section('content')
<div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
    <div class="max-w-xl">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Memperbarui Layanan: {{ $layanan->name }}</h2>
            <p class="mt-1 text-sm text-gray-600">Pastikan semua informasi sudah benar sebelum menyimpan perubahan.</p>
        </header>

        <form method="POST" action="{{ route('layanan.update', $layanan) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Nama Layanan</label>
                <input id="name" type="text" name="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('name', $layanan->name) }}" required autofocus>
                @error('name')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" required>{{ old('description', $layanan->description) }}</textarea>
                @error('description')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="price" class="block font-medium text-sm text-gray-700">Harga (Rp)</label>
                <input id="price" type="number" name="price" step="100" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('price', $layanan->price) }}" required>
                @error('price')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="block font-medium text-sm text-gray-700">Ganti Gambar Layanan</label>
                @if ($layanan->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $layanan->image) }}" alt="{{ $layanan->name }}" class="w-40 h-auto rounded-md shadow-sm">
                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini. Upload gambar baru untuk menggantinya.</p>
                </div>
                @endif
                <input id="image" type="file" name="image" class="block mt-2 w-full text-sm ...">
                @error('image')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3 transition-colors font-medium">Simpan Perubahan</button>
                <a href="{{ route('layanan.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
