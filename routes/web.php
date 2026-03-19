<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\ComplaintController;
use Illuminate\Support\Facades\Route;

// ==========================================
// AREA PUBLIK (Halaman Depan Warga)
// ==========================================
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/blog/kategori/{slug}', [PublicController::class, 'blogCategory'])->name('blog.category');
Route::get('/profil/sejarah', [PublicController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/pengurus', [PublicController::class, 'pengurus'])->name('pengurus.index');
Route::get('/aduan', [PublicController::class, 'aduan'])->name('aduan.index');
Route::post('/aduan', [PublicController::class, 'storeAduan'])->name('aduan.store');
Route::get('/berita/detail/{id}', [PublicController::class, 'showPost'])->name('blog.show');

// ==========================================
// AREA ADMIN (Wajib Login)
// ==========================================

// Halaman Dashboard Utama Admin
Route::get('/dashboard', function () {
    // Menghitung jumlah data dari database secara real-time
    $totalBerita = \App\Models\Post::count();
    $aduanMasuk = \App\Models\Complaint::count();
    $jumlahPengurus = \App\Models\Committee::count();

    // Mengirim data ke tampilan dashboard
    return view('dashboard', compact('totalBerita', 'aduanMasuk', 'jumlahPengurus'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Menu yang Membutuhkan Akses Login
Route::middleware('auth')->group(function () {
    
    // Kelola Profil Akun Admin (Ganti Nama, Email, Password)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Panel Manajemen Web (CRUD)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', PostController::class);
        Route::resource('committees', CommitteeController::class);
        Route::resource('complaints', ComplaintController::class)->only(['index', 'destroy']);
    });
    
});

require __DIR__.'/auth.php';