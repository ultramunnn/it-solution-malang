<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController; 
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

    // Rute Layanan (hanya untuk admin & teknisi)
    Route::middleware(['check.teknisi.admin'])->group(function () {
        Route::resource('layanan', ServiceController::class);
    });

    // Rute Layanan untuk customer
    Route::middleware('role:customer')->group(function () {
        Route::get('/layanan-tersedia', [CustomerController::class, 'showServices'])->name('customer.layanan.list');
    });

     // --- Rute untuk Customer ---
    Route::middleware('role:customer')->group(function() {
        Route::get('/pesan/{service}', [OrderController::class, 'create'])->name('order.create'); // Halaman konfirmasi pesanan
        Route::post('/pesan', [OrderController::class, 'store'])->name('order.store'); // Proses pembuatan pesanan
        Route::get('/pesanan-saya', [OrderController::class, 'indexCustomer'])->name('order.customer.index'); // Halaman "Pesanan Saya"
    });

    // --- Rute untuk Teknisi & Admin ---
    Route::middleware('check.teknisi.admin')->group(function() {
        Route::get('/admin/pesanan', [OrderController::class, 'indexAdmin'])->name('order.admin.index'); // Dashboard semua pesanan
        Route::get('/admin/pesanan/{order}/edit', [OrderController::class, 'edit'])->name('order.admin.edit'); // Halaman edit status
        Route::put('/admin/pesanan/{order}', [OrderController::class, 'update'])->name('order.admin.update'); // Proses update status
    });
});
