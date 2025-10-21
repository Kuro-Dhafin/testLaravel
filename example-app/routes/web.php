<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware; // <-- Import the class

// --- Public Routes ---
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/search', [ServiceController::class, 'search'])->name('services.search');

// --- Authentication Routes ---
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Authenticated User Routes ---
Route::middleware('auth')->group(function () {
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::post('/orders/{service_id}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/upgrade/artist', [ProfileController::class, 'upgradeArtist'])->name('profile.upgrade');
});

// --- Artist Routes ---
// Use the full class name for the middleware
Route::middleware(['auth', RoleMiddleware::class . ':artist'])->prefix('artist')->name('artist.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'artist'])->name('dashboard');
});

// --- Admin Routes ---
// Use the full class name for the middleware
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});
