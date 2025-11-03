<x-layouts.auth title="Update Password">

    <section class="fixed inset-0 flex items-center justify-center px-4 sm:p-16">
        <div class="w-full max-w-lg bg-white rounded-lg shadow p-10 sm:p-16">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-4 mb-1">Update Password</h1>
                <p class="text-base text-5">Silahkan update password anda</p>
            </div>


            <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                <div class="flex flex-col">
                    <label class="text-sm text-grey mb-1">Password Baru</label>
                    <input type="password" id="password" name="password" placeholder="Masukan password baru"
                        class="border border-neutral-300 rounded-md p-4 placeholder-gray-400 focus:outline-none focus:ring focus:ring-cyan-500" required />
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-grey mb-1">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Masukan konfirmasi password"
                        class="border border-neutral-300 rounded-md p-4 placeholder-gray-400 focus:outline-none focus:ring focus:ring-cyan-500" required />
                </div>


                <button type="submit" class="bg-second text-grey rounded-md py-3 mt-2 hover:bg-yellow-400 transition">
                    Update Password
                </button>
            </form>

        </div>
    </section>

</x-layouts.auth>