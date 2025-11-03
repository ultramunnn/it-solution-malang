<x-layouts.dashboard>
    @section('title', 'Chat')
    @section('page-title', 'Chat')

    @section('content')
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-3 to-2 p-6">
                    <h2 class="text-2xl font-bold text-white">Pesan</h2>
                    <p class="text-white opacity-80 mt-1">Chat dengan teknisi atau customer</p>
                </div>

                <!-- Users List -->
                <div class="divide-y divide-gray-200">
                    @forelse($users as $user)
                        <a href="{{ route('chat.show', $user) }}"
                            class="block hover:bg-gray-50 transition-colors duration-200">
                            <div class="p-6">
                                <div class="flex items-center gap-4">
                                    <!-- Avatar -->
                                    <div class="relative flex-shrink-0">
                                        <div
                                            class="w-14 h-14 rounded-full bg-gradient-to-br from-2 to-3 flex items-center justify-center text-white font-bold text-xl">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        @if ($user->unread_count > 0)
                                            <span
                                                class="absolute -top-1 -right-1 w-6 h-6 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center animate-pulse">
                                                {{ $user->unread_count > 9 ? '9+' : $user->unread_count }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- User Info -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <h3 class="font-semibold text-grey text-lg truncate">
                                                {{ $user->name }}
                                            </h3>
                                            @if ($user->last_message_time)
                                                <span class="text-sm text-gray-500 ml-2">
                                                    {{ \Carbon\Carbon::parse($user->last_message_time)->diffForHumans() }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <span
                                                class="px-2 py-1 rounded-full text-xs font-medium {{ $user->role === 'teknisi' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                            @if ($user->last_message)
                                                <p class="text-grey opacity-70 truncate text-sm">
                                                    {{ $user->last_message }}
                                                </p>
                                            @else
                                                <p class="text-grey opacity-50 italic text-sm">Belum ada pesan</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Arrow -->
                                    <svg class="w-6 h-6 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-grey mb-2">Belum Ada Percakapan</h3>
                            <p class="text-grey opacity-70">
                                @if (Auth::user()->role === 'customer')
                                    Mulai chat dengan teknisi untuk konsultasi perbaikan perangkat Anda
                                @else
                                    Belum ada customer yang menghubungi Anda
                                @endif
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection
</x-layouts.dashboard>
