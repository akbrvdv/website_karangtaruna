<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommitteeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\ProfileController;

// ==========================================
// AREA PUBLIK (Tanpa Login)
// ==========================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita.index');
Route::get('/pengurus', [PublicController::class, 'pengurus'])->name('pengurus.index');

Route::get('/aduan', [PublicController::class, 'aduan'])->name('aduan.index');
Route::post('/aduan', [PublicController::class, 'storeAduan'])->name('aduan.store');

// ==========================================
// AREA ADMIN (Wajib Login)
// ==========================================
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class)->except(['create', 'show', 'edit']);
    Route::resource('complaints', ComplaintController::class)->only(['index', 'update', 'destroy']);
    // ... route admin lainnya
Route::resource('posts', PostController::class)->except(['create', 'show', 'edit']);
Route::resource('complaints', ComplaintController::class)->only(['index', 'update', 'destroy']);

// TAMBAHKAN DUA BARIS INI:
Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit', 'update']);
Route::resource('committees', CommitteeController::class)->except(['create', 'show', 'edit', 'update']);
});

// ==========================================
// BAWAAN BREEZE (Jangan Dihapus)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';