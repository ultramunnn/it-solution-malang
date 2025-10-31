<x-layouts.auth title="Lupa Password">

    <section class="fixed inset-0 flex items-center justify-center px-4 sm:p-16">
        <div
            class="max-w-[1085px] w-full mx-auto p-8 md:p-14 bg-white rounded-lg border border-gray-200 relative flex flex-col md:flex-row gap-10">
            <!-- Keterangan -->
            <div class="flex-1 flex flex-col gap-3">
                <h2 class="text-4xl font-bold text-cyan-700 leading-tight">Reset Password</h2>
                <p class="text-base text-cyan-500">Isi gmail anda yang sudah terdaftar</p>
            </div>

            <!-- Form -->
            <div class="flex-1 flex flex-col gap-6">
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-medium text-black" for="email">Email</label>
                    <input id="email" type="email" placeholder="Enter your Email"
                        class="w-full px-3 py-2 border border-black/10 rounded-md focus:outline-none focus:ring focus:ring-3" />
                </div>

                <div class="flex gap-4">
                    <a href="/login"
                        class="w-60 text-center px-4 py-3 border border-3 text-cyan-700 font-medium rounded-lg hover:bg-cyan-50 transition">Go
                        Back to Login</a>
                    <button
                        class="w-60 px-4 py-3 bg-yellow-300 text-neutral-700 font-medium rounded-lg hover:bg-yellow-400 transition">Send
                        Reset Link</button>
                </div>
            </div>

        
        </div>

    </section>

</x-layouts.auth>
