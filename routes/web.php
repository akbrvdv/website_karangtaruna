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
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute khusus manajemen Admin (Sekarang terbuka full untuk Tambah, Edit, Hapus)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('committees', CommitteeController::class);
        Route::resource('complaints', ComplaintController::class);
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

require __DIR__.'/auth.php';