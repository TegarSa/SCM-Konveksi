<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ProductController;

// =======================
// LOGIN & LOGOUT
// =======================
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// =======================
// DASHBOARD (ADMIN, STAFF, MANAGER)
// =======================
Route::middleware(['cek_login:admin,staff,manager'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});


// =======================
// ADMIN ROUTES (User Management)
// =======================
Route::middleware(['cek_login:admin'])->prefix('dashboard/admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


// =======================
// MANAGEMEN PERSEDIAAN BARANG
// =======================
Route::middleware(['auth'])->group(function () {
    Route::get('persediaan', [ProductController::class, 'index'])->name('persediaan.index');
    Route::get('persediaan/create', [ProductController::class, 'create'])->name('persediaan.create');
    Route::post('persediaan', [ProductController::class, 'store'])->name('persediaan.store');
    Route::get('persediaan/{barang}/edit', [ProductController::class, 'edit'])->name('persediaan.edit');
    Route::put('persediaan/{barang}', [ProductController::class, 'update'])->name('persediaan.update');
});
