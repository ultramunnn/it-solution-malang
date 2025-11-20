<x-layouts.dashboard>
    @section('title', 'Chat dengan ' . $user->name)
    @section('page-title', 'Chat')

    @section('content')
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col" style="height: calc(100vh - 200px);">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-3 to-2 p-4 flex items-center gap-4">
                    <a href="{{ route('chat.index') }}"
                        class="text-white  p-2 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>

                    <div class="w-12 h-12 rounded-full bg-white bg-opacity-20 flex items-center justify-center text-white font-bold text-lg">
                        {{ substr($user->name, 0, 1) }}
                    </div>

                    <div class="flex-1">
                        <h2 class="text-xl font-bold text-white">{{ $user->name }}</h2>
                        <p class="text-white opacity-80 text-sm">{{ ucfirst($user->role) }}</p>
                    </div>
                </div>

                <!-- Messages Container -->
                <div id="messagesContainer" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
                    @foreach ($messages as $message)
                        @php
                            $isSender = $message->sender_id === Auth::id();
                        @endphp

                        <div class="flex {{ $isSender ? 'justify-end' : 'justify-start' }}" data-message-id="{{ $message->id }}">
                            <div class="{{ $isSender ? 'order-2' : 'order-1' }}">
                                <div
                                    class="max-w-md {{ $isSender ? 'bg-3 text-white' : 'bg-white text-grey' }} rounded-2xl px-3 py-2 shadow-md">
                                    @if ($message->image_path)
                                        <img src="{{ asset('storage/' . $message->image_path) }}" alt="Image"
                                            class="rounded-lg mb-2 w-full max-w-350px sm:max-w-sm max-h-72 object-cover cursor-pointer hover:opacity-90"
                                            onclick="openImageModal('{{ asset('storage/' . $message->image_path) }}')">
                                    @endif
                                    @if ($message->message)
                                        <p class="break-words whitespace-pre-wrap">{{ $message->message }}</p>
                                    @endif
                                    <p class="text-xs {{ $isSender ? 'text-white opacity-70' : 'text-gray-500' }} mt-1">
                                        {{ $message->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Loading indicator -->
                    <div id="loadingIndicator" class="hidden justify-center">
                        <div class="bg-gray-200 rounded-full px-4 py-2 text-sm text-gray-600">
                            Sedang mengirim...
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="border-t border-gray-200 p-4 bg-white">
                    <!-- Image Preview -->
                    <div id="imagePreviewContainer" class="hidden mb-3">
                        <div class="relative inline-block">
                            <img id="imagePreview" src="" alt="Preview" class="max-h-32 rounded-lg">
                            <button type="button" onclick="removeImage()"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <form id="messageForm" class="flex items-stretch gap-2" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="imageInput" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">

                        <button type="button" onclick="document.getElementById('imageInput').click()"
                            class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-grey rounded-lg transition-colors self-end">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </button>

                        <div class="flex-1">
                            <textarea id="messageInput" name="message" rows="1" placeholder="Ketik pesan..."
                                class="w-full h-12 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                style="max-height: 120px; min-height: 3rem;"></textarea>
                        </div>

                        <button type="submit"
                            class="flex-shrink-0 h-12 px-4 bg-3 hover:bg-4 text-white rounded-lg transition-colors font-medium flex items-center justify-center gap-2 shadow-md self-end">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span class="hidden sm:inline">Kirim</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                const messagesContainer = document.getElementById('messagesContainer');
                const messageForm = document.getElementById('messageForm');
                const messageInput = document.getElementById('messageInput');
                const imageInput = document.getElementById('imageInput');
                const imagePreview = document.getElementById('imagePreview');
                const imagePreviewContainer = document.getElementById('imagePreviewContainer');
                const loadingIndicator = document.getElementById('loadingIndicator');
                const userId = {{ $user->id }};
                const currentUserId = {{ Auth::id() }};

                // Preview image before upload
                function previewImage(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreviewContainer.classList.remove('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                }

                // Remove image
                function removeImage() {
                    imageInput.value = '';
                    imagePreview.src = '';
                    imagePreviewContainer.classList.add('hidden');
                }

                // Auto-resize textarea
                messageInput.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });

                // Scroll to bottom
                function scrollToBottom() {
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }

                // Scroll to bottom on load
                scrollToBottom();

                // Send message
                messageForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const message = messageInput.value.trim();
                    const imageFile = imageInput.files[0];

                    // Validasi: harus ada message atau image
                    if (!message && !imageFile) {
                        alert('Silakan ketik pesan atau pilih gambar');
                        return;
                    }

                    // Show loading
                    loadingIndicator.classList.remove('hidden');

                    try {
                        // Use FormData untuk upload file
                        const formData = new FormData();
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                        if (message) formData.append('message', message);
                        if (imageFile) formData.append('image', imageFile);

                        const response = await fetch(`/chat/${userId}/send`, {
                            method: 'POST',
                            body: formData
                        });

                        const data = await response.json();

                        if (data.success) {
                            // Add message to UI
                            addMessageToUI(data.message, true);

                            // Clear input
                            messageInput.value = '';
                            messageInput.style.height = 'auto';
                            removeImage();

                            // Scroll to bottom
                            scrollToBottom();
                        } else {
                            alert(data.error || 'Gagal mengirim pesan');
                        }
                    } catch (error) {
                        console.error('Error sending message:', error);
                        alert('Gagal mengirim pesan. Silakan coba lagi.');
                    } finally {
                        loadingIndicator.classList.add('hidden');
                    }
                });

                // Add message to UI
                function addMessageToUI(message, isSender) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `flex ${isSender ? 'justify-end' : 'justify-start'}`;
                    messageDiv.setAttribute('data-message-id', message.id);

                    const time = new Date(message.created_at).toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    let imageHtml = '';
                    if (message.image_path) {
                        imageHtml = `<img src="/storage/${message.image_path}" alt="Image"
                            class="rounded-lg mb-2 w-full max-w-[100px] sm:max-w-sm max-h-4 object-cover cursor-pointer hover:opacity-90"
                            onclick="openImageModal('/storage/${message.image_path}')">`;
                    }

                    let messageText = '';
                    if (message.message) {
                        messageText = `<p class="break-words whitespace-pre-wrap">${escapeHtml(message.message)}</p>`;
                    }

                    messageDiv.innerHTML = `
                        <div class="${isSender ? 'order-2' : 'order-1'}">
                            <div class="max-w-md ${isSender ? 'bg-3 text-white' : 'bg-white text-grey'} rounded-2xl px-4 py-3 shadow-md">
                                ${imageHtml}
                                ${messageText}
                                <p class="text-xs ${isSender ? 'text-white opacity-70' : 'text-gray-500'} mt-1">
                                    ${time}
                                </p>
                            </div>
                        </div>
                    `;

                    // Insert before loading indicator
                    messagesContainer.insertBefore(messageDiv, loadingIndicator);
                }

                // Escape HTML to prevent XSS
                function escapeHtml(text) {
                    const div = document.createElement('div');
                    div.textContent = text;
                    return div.innerHTML;
                }

                // Poll for new messages every 3 seconds
                setInterval(async function() {
                    try {
                        const response = await fetch(`/chat/${userId}/messages`);
                        const messages = await response.json();

                        // Get current message IDs
                        const currentMessageIds = Array.from(messagesContainer.querySelectorAll('[data-message-id]'))
                            .map(el => parseInt(el.dataset.messageId));

                        // Add new messages
                        messages.forEach(message => {
                            if (!currentMessageIds.includes(message.id)) {
                                const isSender = message.sender_id === currentUserId;
                                addMessageToUI(message, isSender);

                                // Scroll to bottom if new message
                                if (!isSender) {
                                    scrollToBottom();
                                }
                            }
                        });
                    } catch (error) {
                        console.error('Error fetching messages:', error);
                    }
                }, 3000);

                // Allow Enter to send (Shift+Enter for new line)
                messageInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        messageForm.dispatchEvent(new Event('submit'));
                    }
                });

                // Open image modal
                function openImageModal(imageUrl) {
                    const modal = document.getElementById('imageModal');
                    const modalImage = document.getElementById('modalImage');
                    modalImage.src = imageUrl;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }

                // Close image modal
                function closeImageModal() {
                    const modal = document.getElementById('imageModal');
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }
            </script>
        @endpush

        <!-- Image Modal -->
        <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 items-center justify-center p-4"
            onclick="closeImageModal()">
            <div class="relative max-w-4xl max-h-full">
                <button onclick="closeImageModal()"
                    class="absolute -top-10 right-0 text-white hover:text-gray-300 text-4xl font-bold">
                    &times;
                </button>
                <img id="modalImage" src="" alt="Full size image" class="max-w-full max-h-screen rounded-lg">
            </div>
        </div>
    @endsection
</x-layouts.dashboard>
