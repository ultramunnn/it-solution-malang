<x-layouts.auth title="Login">

    <section class="fixed inset-0 flex items-center justify-center px-4 sm:p-16">
        <div class="w-full max-w-lg bg-white rounded-lg shadow p-10 sm:p-16">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-4 mb-1">Login ke Akun Kamu</h1>
                <p class="text-base text-5">Selamat datang di IT Solution Malang</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                @csrf
                <div class="flex flex-col">
                    <label class="text-sm text-grey mb-1">Email / Username</label>
                    <input type="text" id="email" name="email" placeholder="Masukan email or username" class="border border-neutral-300 rounded-md p-4 placeholder-gray-400 focus:outline-none focus:ring focus:ring-cyan-500" />
                </div>

                <div class="flex flex-col">
                    <label class="text-sm text-grey mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan password" class="border border-neutral-300 rounded-md p-4 placeholder-gray-400 focus:outline-none focus:ring focus:ring-cyan-500" />
                </div>

                <div class="flex justify-between items-center text-sm text-grey">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="w-4 h-4 border-grey" />
                        Remember Me
                    </label>
                    <a href="{{ route('lupa-password') }}" class="text-cyan-700">Lupa Password?</a>
                </div>

                <button type="submit" class="bg-second text-grey rounded-md py-3 mt-2 hover:bg-yellow-400 transition">
                    Login
                </button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-grey mt-4">
                Belum Memiliki Akun? <a href="
                    {{ route('register') }}" class="text-cyan-700 font-semibold">Sign Up</a>
            </p>
        </div>
    </section>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true
            , position: 'center-top', 
            showConfirmButton: false
            , timer: 3000, 
            timerProgressBar: true
            , didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success'
            , title: "{{ session('success') }}"
        })

    </script>
    @endif
    @endpush


</x-layouts.auth>
