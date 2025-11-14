@extends('components.layouts.dashboard')
@section('title', 'Tambah Layanan Baru')
@section('page-title', 'Tambah Layanan Baru')

@section('content')
<div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
    <div class="max-w-xl">
        <form method="POST" action="{{ route('layanan.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Nama Layanan</label>
                <input id="name" type="text" name="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('name') }}" required autofocus>
                @error('name')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" required>{{ old('description') }}</textarea>
                @error('description')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="price" class="block font-medium text-sm text-gray-700">Harga (Rp)</label>
                <input id="price" type="number" name="price" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('price') }}" required>
                @error('price')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="block font-medium text-sm text-gray-700">Gambar Layanan</label>
                <input id="image" type="file" name="image" class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100">
                @error('image')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-4">
                <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3 transition-colors font-medium">Simpan Layanan</button>
                <a href="{{ route('layanan.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
