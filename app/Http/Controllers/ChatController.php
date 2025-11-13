<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * 
     * 
     */
    public function index()
    {
        $currentUser = Auth::user();
        if ($currentUser->role === 'teknisi' || $currentUser->role === 'admin') {
            return redirect()->route('chat.dashboard');
        }
        $users = User::where('role', 'teknisi')->get()->map(function ($user) use ($currentUser) {
            return $this->appendLastMessageDetails($currentUser, $user);
        });
        return view('chat.index', compact('users'));
    }

    /**
     * Menampilkan Dashboard Chat untuk Teknisi & Admin.
     */
    public function showChatDashboard()
    {
        $currentUser = Auth::user();
        $users = User::where('role', 'customer')->get()->map(function ($user) use ($currentUser) {
            return $this->appendLastMessageDetails($currentUser, $user);
        });
        return view('chat.index', compact('users'));
    }

    /**
     * Menampilkan percakapan dengan pengguna tertentu.
     */
    public function show(User $user)
    {
        $currentUser = Auth::user();
        $viewedUser = $user;
        
        $isAllowed = false;

  
        if ($currentUser->role === 'admin') {
            $isAllowed = true;
        }

        if ($currentUser->role === 'teknisi' && $viewedUser->role === 'customer') {
            $isAllowed = true;
        }

        if ($currentUser->role === 'customer' && ($viewedUser->role === 'teknisi' || $viewedUser->role === 'admin')) {
            $isAllowed = true;
        }

        if (!$isAllowed) {
            abort(403); 
        }


        $messages = $this->getMessagesBetweenUsers($currentUser, $viewedUser);
        $this->markMessagesAsRead($viewedUser, $currentUser);

        return view('chat.show', ['user' => $viewedUser, 'messages' => $messages]);
    }


    public function sendMessage(Request $request, User $user)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if (!$request->message && !$request->hasFile('image')) {
            return response()->json(['success' => false, 'error' => 'Pesan atau gambar harus diisi'], 422);
        }
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('chat-images', 'public') : null;
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'message' => $request->message,
            'image_path' => $imagePath,
        ]);
        $message->load('sender', 'receiver');
        return response()->json(['success' => true, 'message' => $message]);
    }

    public function getMessages(User $user)
    {
        $currentUser = Auth::user();
        $messages = $this->getMessagesBetweenUsers($currentUser, $user);
        $this->markMessagesAsRead($user, $currentUser);
        return response()->json($messages);
    }

    private function getMessagesBetweenUsers($user1, $user2)
    {
        return Message::where(function ($query) use ($user1, $user2) {
            $query->where('sender_id', $user1->id)->where('receiver_id', $user2->id);
        })->orWhere(function ($query) use ($user1, $user2) {
            $query->where('sender_id', $user2->id)->where('receiver_id', $user1->id);
        })->with(['sender', 'receiver'])->orderBy('created_at', 'asc')->get();
    }

    private function markMessagesAsRead($sender, $receiver)
    {
        Message::where('sender_id', $sender->id)->where('receiver_id', $receiver->id)->where('is_read', false)->update(['is_read' => true]);
    }

    private function appendLastMessageDetails($currentUser, $user)
    {
        $user->withCount(['sentMessages as unread_count' => function ($query) use ($currentUser) {
            $query->where('receiver_id', $currentUser->id)->where('is_read', false);
        }]);
        $lastMessage = Message::where(function ($query) use ($currentUser, $user) {
            $query->where('sender_id', $currentUser->id)->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($currentUser, $user) {
            $query->where('sender_id', $user->id)->where('receiver_id', $currentUser->id);
        })->orderBy('created_at', 'desc')->first();
        $user->last_message = $lastMessage?->message ?? ($lastMessage?->image_path ? '📷 Foto' : null);
        $user->last_message_time = $lastMessage?->created_at;
        return $user;
    }
}