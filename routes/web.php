<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ComplaintController;
use Illuminate\Support\Facades\Route;

// ==========================================
// AREA PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita.index');
Route::get('/pengurus', [PublicController::class, 'pengurus'])->name('pengurus.index');

Route::get('/aduan', [PublicController::class, 'aduan'])->name('aduan.index');
Route::post('/aduan', [PublicController::class, 'storeAduan'])->name('aduan.store');

// ==========================================
// AREA ADMIN & DASHBOARD (Wajib Login)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rute Dashboard (Bawaan Breeze, jangan dikasih prefix admin)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute khusus manajemen Admin (Dikelompokkan di dalam prefix /admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', PostController::class)->except(['create', 'show', 'edit']);
        Route::resource('complaints', ComplaintController::class)->only(['index', 'update', 'destroy']);
        Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit', 'update']);
        Route::resource('committees', CommitteeController::class)->except(['create', 'show', 'edit', 'update']);
    });
});

// ==========================================
// AREA PROFIL (Bawaan Breeze)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==========================================
// RUTE AUTENTIKASI (Bawaan Breeze)
// ==========================================
require __DIR__.'/auth.php';