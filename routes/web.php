<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentsController;

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
Route::prefix('/persediaan')->middleware(['auth'])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('persediaan.index');
        Route::get('/create', [ProductController::class, 'create'])->name('persediaan.create');
        Route::post('/store', [ProductController::class, 'store'])->name('persediaan.store');
        Route::get('/edit/{barang}', [ProductController::class, 'edit'])->name('persediaan.edit');
        Route::post('/update/{barang}', [ProductController::class, 'update'])->name('persediaan.update');
        Route::post('/delete/{barang}', [ProductController::class, 'destroy'])->name('persediaan.destroy');
});

// =======================
// Daftar Pengiriman Barang / Shipments Management
// =======================
Route::prefix('/shipments')->middleware(['auth'])->group(function () {
        Route::get('/', [ShipmentsController::class, 'index'])->name('shipments.index');
        Route::get('/create', [ShipmentsController::class, 'create'])->name('shipments.create');
        Route::post('/store', [ShipmentsController::class, 'store'])->name('shipments.store');
        Route::get('/edit/{shipment}', [ShipmentsController::class, 'edit'])->name('shipments.edit');
        Route::post('/update/{shipment}', [ShipmentsController::class, 'update'])->name('shipments.update');
        Route::post('/delete/{shipment}', [ShipmentsController::class, 'destroy'])->name('shipments.destroy');
});


// Route::middleware(['cek_login:admin'])->prefix('dashboard/admin')->group(function () {

//         Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
//         Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
//         Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
// });
