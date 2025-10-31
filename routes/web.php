<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

// Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/lupa-password', [AuthController::class, 'lupaPassword'])->name('lupa-password');
Route::get('/update-password', [AuthController::class, 'updatePassword'])->name('update-password');


//route untuk tamu yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'tampilkanRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'tampilkanLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

//route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard', 'index'])->name('dashboard');
});
