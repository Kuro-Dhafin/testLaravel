<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;

// --- Public Routes ---
Route::get('/', function () {
    $services = \App\Models\Service::latest()->paginate(12);

    if (auth()->check()) {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'artist' => redirect()->route('artist.dashboard'),
            default => view('welcome', compact('services')),
        };
    }

    return view('welcome', compact('services'));
});

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
    Route::post('/orders/{service}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/upgrade/artist', [ProfileController::class, 'upgradeArtist'])->name('profile.upgrade');
});

// --- Artist Routes ---
Route::prefix('artist')->name('artist.')->middleware(['auth', RoleMiddleware::class . ':artist'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'artist'])->name('dashboard');
    Route::get('/orders', [OrderController::class, 'artistOrders'])->name('orders.index');
    Route::put('/orders/{order}', [OrderController::class, 'updateStatus'])->name('orders.update');
    Route::resource('services', ServiceController::class)->except(['show'])->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);
});

// --- Admin Routes ---
Route::prefix('admin')->name('admin.')->middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

    // User management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Orders management
    Route::get('/orders', [OrderController::class, 'allOrders'])->name('orders.index');
});

