<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

// --- Rute Autentikasi ---
Route::get('/lupa-password', [AuthController::class, 'tampilkanLupaPassword'])->name('lupa-password');
Route::post('/lupa-password', [AuthController::class, 'kirimResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'tampilkanFormReset'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

// --- Rute untuk Tamu (Guest) ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'tampilkanRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'tampilkanLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// --- RUTE UNTUK PENGGUNA YANG SUDAH LOGIN ---
Route::middleware(['auth', 'prevent.back'])->group(function () {

    // Rute Umum (bisa diakses semua role)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');



    // Link "Chat" di semua dashboard
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

    // DASHBOARD CHAT (Hanya untuk Teknisi & Admin)

    Route::get('/chat/dashboard', [ChatController::class, 'showChatDashboard'])
        ->name('chat.dashboard')
        ->middleware('check.teknisi.admin');

    //ISI CHAT
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{user}/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/{user}/messages', [ChatController::class, 'getMessages'])->name('chat.messages');

    // Rute Profil Pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
