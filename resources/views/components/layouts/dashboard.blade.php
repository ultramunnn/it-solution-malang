<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-1 font-sans">
    
    <div class="flex h-screen overflow-hidden">      <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-0 transform -translate-x-full xl:translate-x-0 w-64 bg-4 text-white flex flex-col transition-transform duration-300 z-50 shadow-xl">

            <!-- Close button only for mobile -->
            <div class="flex justify-end p-4 xl:hidden">
                <button id="closeSidebar" class="text-white hover:text-second">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Logo/Brand -->
            <div class="p-6 border-b border-3 flex items-center justify-between xl:justify-start">
                <h1 class="text-2xl font-poppins font-bold text-second">Dashboard</h1>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 overflow-y-auto py-6">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-3 text-white' : 'hover:bg-3/70 hover:text-white text-gray-200' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                            </svg>
                            <span class="font-medium">Beranda</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('chat.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('chat.*') ? 'bg-3 text-white' : 'hover:bg-3/70 hover:text-white text-gray-200' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="font-medium">Chat</span>
                        </a>
                    </li>

                    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'teknisi')
                        <li>
                            <a href="{{ route('layanan.index') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('layanan.*') ? 'bg-3 text-white' : 'hover:bg-3/70 hover:text-white text-gray-200' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M12 21a9 9 0 110-18 9 9 0 010 18z" />
                                </svg>
                                <span class="font-medium">Kelola Layanan</span>
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->role === 'customer')
                        <li>
                            <a href="{{ route('customer.layanan.list') }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('customer.layanan.list') ? 'bg-3 text-white' : 'hover:bg-3/70 hover:text-white text-gray-200' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span class="font-medium">Daftar Layanan</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

            <!-- User Profile Section -->
            <div class="p-4 border-t border-3 bg-3/20">
                <div
                    class="flex items-center gap-3 px-4 py-3 rounded-lg bg-3/40 hover:bg-3/60 transition-colors cursor-pointer shadow-sm">
                    <div class="w-10 h-10 rounded-full bg-2 flex items-center justify-center text-4 font-bold">
                        {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-sm text-2 truncate">{{ auth()->user()->email ?? 'user@email.com' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay (mobile only) -->
        <div id="overlay" class="fixed inset-0 bg-black/40 hidden z-40 xl:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between px-6 py-4">
                    <button id="sidebarToggle" class="xl:hidden text-grey hover:text-4 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <div class="flex-1 px-4">
                        <h2 class="text-2xl font-poppins font-bold text-grey">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-4 text-white rounded-lg hover:bg-3 transition-colors font-medium">
                            Keluar
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });

        closeSidebar?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

    <script>
        function checkAuthentication() {
            fetch('{{ route('dashboard') }}', {
                method: 'GET',
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then(response => {
                if (response.status === 401 || response.redirected) {
                    window.location.replace('{{ route('home') }}');
                }
            }).catch(() => {
                window.location.replace('{{ route('home') }}');
            });
        }

        window.addEventListener('load', function() {
            if (performance.navigation.type === performance.navigation.TYPE_BACK_FORWARD) {
                checkAuthentication();
            }
        });

        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                checkAuthentication();
            }
        });
    </script>

    @stack('scripts')
    ```

</body>

</html>
