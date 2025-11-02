@extends('components.layouts.dashboard')

@section('title', 'Tambah Layanan')
@section('page-title', 'Tambah Layanan')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('layanan.index') }}"
                class="inline-flex items-center gap-2 text-grey hover:text-3 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar Layanan
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-3 to-4 px-6 py-5">
                <h2 class="text-2xl font-poppins font-bold text-white">Tambah Layanan Baru</h2>
                <p class="text-white/80 text-sm mt-1">Isi formulir di bawah untuk menambahkan layanan IT baru</p>
            </div>

            <!-- Form -->
            <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-grey mb-2">
                        Nama Layanan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-3 focus:border-transparent transition-all @error('title') border-red-500 @enderror"
                        placeholder="Contoh: Service Laptop">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-grey mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-3 focus:border-transparent transition-all @error('description') border-red-500 @enderror"
                        placeholder="Jelaskan detail layanan yang Anda tawarkan...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price & Duration -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-grey mb-2">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" required min="0"
                                step="1000"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-3 focus:border-transparent transition-all @error('price') border-red-500 @enderror"
                                placeholder="100000">
                        </div>
                        @error('price')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duration Estimate -->
                    <div>
                        <label for="duration_estimate" class="block text-sm font-medium text-grey mb-2">
                            Estimasi Durasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="duration_estimate" id="duration_estimate"
                            value="{{ old('duration_estimate') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-3 focus:border-transparent transition-all @error('duration_estimate') border-red-500 @enderror"
                            placeholder="Contoh: 2-3 hari">
                        @error('duration_estimate')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-grey mb-2">
                        Gambar Layanan
                    </label>
                    <div class="flex items-center gap-4">
                        <label for="image"
                            class="flex-1 flex flex-col items-center justify-center px-4 py-6 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-3 transition-all bg-gray-50 hover:bg-gray-100">
                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-gray-600">Klik untuk upload gambar</span>
                            <span class="text-xs text-gray-500 mt-1">PNG, JPG, JPEG (Max. 2MB)</span>
                            <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg"
                                class="hidden" onchange="previewImage(event)">
                        </label>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <p class="text-sm font-medium text-grey mb-2">Preview:</p>
                        <img src="" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                    </div>
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-blue-800">
                            <p class="font-medium mb-1">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-blue-700">
                                <li>Gunakan nama layanan yang jelas dan mudah dipahami</li>
                                <li>Jelaskan detail layanan termasuk yang dikerjakan</li>
                                <li>Pastikan harga dan durasi estimasi akurat</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3 bg-3 text-white rounded-lg hover:bg-4 transition-colors font-medium shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Layanan
                    </button>
                    <a href="{{ route('layanan.index') }}"
                        class="flex-1 flex items-center justify-center gap-2 px-6 py-3 bg-gray-200 text-grey rounded-lg hover:bg-gray-300 transition-colors font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

    <!-- Script for Image Preview -->
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
            const img = preview.querySelector('img');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
@endsection
