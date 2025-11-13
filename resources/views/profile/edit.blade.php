@extends('components.layouts.dashboard')

@section('title', 'Edit Profil')
@section('page-title', 'Edit Profil')

@section('content')
    <div class="space-y-6">
        {{-- Form untuk Informasi Profil --}}
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                    <p class="mt-1 text-sm text-gray-600">Perbarui informasi profil dan alamat email akun Anda.</p>
                </header>
                <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                        <input id="name" type="text" name="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                        @error('name')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input id="email" type="email" name="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="phone" class="block font-medium text-sm text-gray-700">Nomor Telepon</label>
                        <input id="phone" type="text" name="phone" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500" value="{{ old('phone', auth()->user()->phone) }}">
                        @error('phone')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3 transition-colors font-medium">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Form untuk Perbarui Password --}}
        <div class="p-4 sm:p-8 bg-white shadow-md rounded-lg">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">Perbarui Password</h2>
                    <p class="mt-1 text-sm text-gray-600">Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.</p>
                </header>
                <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                    <div>
                        <label for="password" class="block font-medium text-sm text-gray-700">Password Baru</label>
                        <input id="password" type="password" name="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">
                        @error('password')<p class="text-sm text-red-600 mt-2">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Konfirmasi Password Baru</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-cyan-500 focus:ring-cyan-500">
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3 transition-colors font-medium">Simpan Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true, position: 'top-end', showConfirmButton: false, timer: 3000, timerProgressBar: true, target: document.body,
            didOpen: (toast) => { toast.addEventListener('mouseenter', Swal.stopTimer); toast.addEventListener('mouseleave', Swal.resumeTimer); }
        });
        Toast.fire({ icon: 'success', title: "{{ session('success') }}" });
    </script>
    @endif
@endpush