<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/home', fn () => redirect()->route('home'));
Route::get('/menu', [MenuController::class, 'menuPublik'])->name('menu');
Route::get('/kontak', [PublicPageController::class, 'kontak'])->name('kontak');
Route::get('/tentang', [PublicPageController::class, 'tentang'])->name('tentang');
Route::get('/galeri', [GaleriController::class, 'galeriPublik'])->name('galeri');

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    // Login/Logout
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin.auth');
    
    // Password Reset Routes
    Route::get('/forgot-password', [AdminPasswordResetController::class, 'showRequestForm'])
        ->name('password.request');
    Route::post('/forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])
        ->name('password.email');
    Route::get('/reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('/reset-password', [AdminPasswordResetController::class, 'reset'])
        ->name('password.update');
});

// Authenticated Admin Routes
Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Profile
    Route::get('/profile', [AdminController::class, 'showProfile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.editProfile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/profile/update-picture', [AdminController::class, 'updateProfilePicture'])->name('admin.updateProfilePicture');
    
    // Menu Management
    Route::resource('menus', MenuController::class)->except(['edit', 'show']);
    
    // Galeri Management
    Route::resource('galeri', GaleriController::class);
});

// Kontak Form Submission
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');