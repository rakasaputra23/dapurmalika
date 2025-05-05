<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPasswordResetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PublicPageController;


Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::resource('menus', MenuController::class);  // Ini sudah mencakup store, update, destroy, dll
});


Route::get('/home', [PublicPageController::class, 'home'])->name('home');
Route::get('/menu', [PublicPageController::class, 'menu'])->name('menu');
Route::get('/galeri', [PublicPageController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [PublicPageController::class, 'tentang'])->name('tentang');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/galeri', [App\Http\Controllers\GaleriPageController::class, 'index'])->name('galeri');

Route::get('/', function () {
    return view('home', [
        'isAdmin' => Auth::guard('admin')->check(),
        'admin' => Auth::guard('admin')->user()
    ]);
})->name('home');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');

    Route::get('/password/reset', [AdminPasswordResetController::class, 'showRequestForm'])->name('admin.password.request');
    Route::post('/password/email', [AdminPasswordResetController::class, 'sendResetLink'])->name('admin.password.email');
    Route::get('/password/reset/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/password/reset', [AdminPasswordResetController::class, 'reset'])->name('admin.password.update');

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
        Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.editProfile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

        // Dashboard Route
        Route::get('/dashboard', [MenuController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/admin/galeri', [App\Http\Controllers\GaleriController::class, 'store'])->name('galeri.store');
    Route::put('/admin/galeri/{galeri}', [App\Http\Controllers\GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/admin/galeri/{galeri}', [App\Http\Controllers\GaleriController::class, 'destroy'])->name('galeri.destroy');

    });
});
