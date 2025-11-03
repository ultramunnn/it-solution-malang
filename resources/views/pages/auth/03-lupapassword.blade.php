<x-layouts.auth title="Lupa Password">

    <section class="fixed inset-0 flex items-center justify-center px-4 sm:p-16">
        <div
            class="max-w-[1085px] w-full mx-auto p-8 md:p-14 bg-white rounded-lg border border-gray-200 relative flex flex-col md:flex-row gap-10">
            <!-- Keterangan -->
            <div class="flex-1 flex flex-col gap-3">
                <h2 class="text-4xl font-bold text-cyan-700 leading-tight">Reset Password</h2>
                <p class="text-base text-cyan-500">Isi gmail anda yang sudah terdaftar</p>
            </div>

            {{-- [FIX] Membungkus seluruh bagian form dengan tag <form> --}}
            <form method="POST" action="{{ route('password.email') }}" class="flex-1 flex flex-col gap-6">
                @csrf {{-- [FIX] Menambahkan token keamanan CSRF --}}

                <!-- Untuk menampilkan pesan sukses: "Link telah terkirim!" -->
                @if (session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-black" for="email">Email</label>
                    <input id="email" type="email" placeholder="Enter your Email"
                        {{-- [FIX] Menambahkan name, value, dan required --}}
                        name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2 border border-black/10 rounded-md focus:outline-none focus:ring focus:ring-cyan-500" />
                    
                    <!-- [FIX] Untuk menampilkan pesan error: "Email tidak ditemukan" -->
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-4">
                    {{-- [FIX] Menggunakan route() helper untuk link --}}
                    <a href="{{ route('login') }}"
                        class="w-60 text-center px-4 py-3 border border-3 text-cyan-700 font-medium rounded-lg hover:bg-cyan-50 transition">Go
                        Back to Login</a>
                    
                    {{-- [FIX] Mengubah <button> menjadi <button type="submit"> --}}
                    <button type="submit"
                        class="w-60 px-4 py-3 bg-yellow-300 text-neutral-700 font-medium rounded-lg hover:bg-yellow-400 transition">Send
                        Reset Link</button>
                </div>
            </form>

        </div>
    </section>

</x-layouts.auth>