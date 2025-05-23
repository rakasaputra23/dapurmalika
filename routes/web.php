<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GaleriPageController;
use App\Http\Controllers\KontakController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// (Opsional) Jika /home tidak dibutuhkan, bisa dihapus atau redirect ke /
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/menu', [MenuController::class, 'menuPublik'])->name('menu');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [PublicPageController::class, 'tentang'])->name('tentang');

// Galeri Halaman Publik
Route::get('/galeri', [GaleriPageController::class, 'index'])->name('galeri');

// Route untuk admin menu management
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('menus', MenuController::class)->except(['edit', 'show']);
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Auth
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');

    // Reset Password
    Route::get('/password/reset', [AdminPasswordResetController::class, 'showRequestForm'])->name('admin.password.request');
    Route::post('/password/email', [AdminPasswordResetController::class, 'sendResetLink'])->name('admin.password.email');
    Route::get('/password/reset/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/password/reset', [AdminPasswordResetController::class, 'reset'])->name('admin.password.update');

    // Routes yang hanya bisa diakses jika sudah login sebagai admin
    Route::middleware(['admin.auth'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
        // Profile
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
        Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.editProfile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
        Route::post('/profile/update-picture', [AdminController::class, 'updateProfilePicture'])->name('admin.updateProfilePicture');
    
        // Menu Management
        Route::resource('menus', MenuController::class)->except(['edit', 'show']);
    
        // Galeri Management
        Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
        Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
        Route::put('/galeri/{galeri}', [GaleriController::class, 'update'])->name('galeri.update');
        Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    });

    Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
});
