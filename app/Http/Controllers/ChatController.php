<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Tampilkan daftar users untuk chat
    public function index()
    {
        $currentUser = Auth::user();

        // Tentukan role yang ingin dilihat
        $targetRole = $currentUser->role === 'customer' ? 'teknisi' : 'customer';

        $users = User::where('role', $targetRole)
            ->withCount([
                'sentMessages as unread_count' => function ($query) use ($currentUser) {
                    $query->where('receiver_id', $currentUser->id)
                        ->where('is_read', false);
                }
            ])
            ->get()
            ->map(function ($user) use ($currentUser) {

                // Get last message between current user and this user
                $lastMessage = Message::where(function ($query) use ($currentUser, $user) {
                    $query->where('sender_id', $currentUser->id)
                        ->where('receiver_id', $user->id);
                })
                    ->orWhere(function ($query) use ($currentUser, $user) {
                    $query->where('sender_id', $user->id)
                        ->where('receiver_id', $currentUser->id);
                })
                    ->orderBy('created_at', 'desc')
                    ->first();

                $user->last_message = $lastMessage?->message ?? ($lastMessage?->image_path ? '📷 Foto' : null);
                $user->last_message_time = $lastMessage?->created_at;

                return $user;
            });

        return view('chat.index', compact('users'));
    }

    // Tampilkan chat room dengan user tertentu
    public function show(User $user)
    {
        $currentUser = Auth::user();

        $messages = $this->getMessagesBetweenUsers($currentUser, $user);

        // Mark pesan sebagai sudah dibaca
        $this->markMessagesAsRead($user, $currentUser);

        return view('chat.show', compact('user', 'messages'));
    }

    // Kirim pesan
    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!$request->message && !$request->hasFile('image')) {
            return response()->json([
                'success' => false,
                'error' => 'Pesan atau gambar harus diisi',
            ], 422);
        }

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('chat-images', 'public')
            : null;

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'message' => $request->message,
            'image_path' => $imagePath,
        ]);

        $message->load('sender', 'receiver');

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }

    // Get messages (untuk polling/AJAX)
    public function getMessages(User $user)
    {
        $currentUser = Auth::user();

        $messages = $this->getMessagesBetweenUsers($currentUser, $user);

        $this->markMessagesAsRead($user, $currentUser);

        return response()->json($messages);
    }

    // ========== PRIVATE METHODS ==========

    /**
     * Get messages between two users
     */
    private function getMessagesBetweenUsers($user1, $user2)
    {
        return Message::where(function ($query) use ($user1, $user2) {
            $query->where('sender_id', $user1->id)
                ->where('receiver_id', $user2->id);
        })
            ->orWhere(function ($query) use ($user1, $user2) {
                $query->where('sender_id', $user2->id)
                    ->where('receiver_id', $user1->id);
            })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /**
     * Mark messages as read
     */
    private function markMessagesAsRead($sender, $receiver)
    {
        Message::where('sender_id', $sender->id)
            ->where('receiver_id', $receiver->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);
    }
}