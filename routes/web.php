<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ServiceController;
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


Route::middleware('auth')->group(function (){
    Route::get('/layanan', [ServiceController::class,'index'])->name('layanan.index');
    Route::get('/layanan/create', [ServiceController::class,'create'])->name('layanan.create');
    Route::post('/layanan', [ServiceController::class,'store'])->name('layanan.store');
    Route::get('/layanan/{service}', [ServiceController::class,'show'])->name('layanan.show');
    Route::get('/layanan/{service}/edit', [ServiceController::class,'edit'])->name('layanan.edit');
    Route::put('/layanan/{service}', [ServiceController::class,'update'])->name('layanan.update');
    Route::delete('/layanan/{service}', [ServiceController::class,'destroy'])->name('layanan.destroy');
});