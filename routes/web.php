<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 🔹 Halaman pencarian bisa diakses semua user
Route::get('/search', [SearchController::class, 'search'])->name('search');

// 🔹 Halaman utama (home) - Bisa diakses user biasa & admin
Route::get('/', function () {
    return view('home', [
        'isAdmin' => Auth::guard('admin')->check(),
        'admin' => Auth::guard('admin')->user() // Mengirim data admin jika login
    ]);
})->name('home');

// 🔹 Grouping Route untuk Admin
Route::prefix('admin')->group(function () {
    
    // 🟢 Login & Logout (Tanpa Middleware)
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');

    // 🟢 Reset Password
    Route::get('/password/reset', [AdminPasswordResetController::class, 'showRequestForm'])->name('admin.password.request');
    Route::post('/password/email', [AdminPasswordResetController::class, 'sendResetLink'])->name('admin.password.email');
    Route::get('/password/reset/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/password/reset', [AdminPasswordResetController::class, 'reset'])->name('admin.password.update');

    // 🔴 Halaman yang hanya bisa diakses jika admin sudah login
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
        Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.editProfile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    });
});
