<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\PurchaseOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShipmentsController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['cek_login:admin,staff,manager'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::prefix('/supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::post('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::post('/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    });

    Route::prefix('/purchase-order')->group(function () {
        Route::get('/', [PurchaseOrderController::class, 'index'])->name('po.index');
        Route::get('/create', [PurchaseOrderController::class, 'create'])->name('po.create');
        Route::post('/store', [PurchaseOrderController::class, 'store'])->name('po.store');
        Route::get('/edit/{id}', [PurchaseOrderController::class, 'edit'])->name('po.edit');
        Route::post('/update/{id}', [PurchaseOrderController::class, 'update'])->name('po.update');
    });

    Route::prefix('/persediaan')->middleware(['auth'])->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('persediaan.index');
        Route::get('/create', [ProductController::class, 'create'])->name('persediaan.create');
        Route::post('/store', [ProductController::class, 'store'])->name('persediaan.store');
        Route::get('/edit/{barang}', [ProductController::class, 'edit'])->name('persediaan.edit');
        Route::post('/update/{barang}', [ProductController::class, 'update'])->name('persediaan.update');
        Route::post('/delete/{barang}', [ProductController::class, 'destroy'])->name('persediaan.destroy');
    });

    Route::prefix('/shipments')->middleware(['auth'])->group(function () {
        Route::get('/', [ShipmentsController::class, 'index'])->name('shipments.index');
        Route::get('/create', [ShipmentsController::class, 'create'])->name('shipments.create');
        Route::post('/store', [ShipmentsController::class, 'store'])->name('shipments.store');
        Route::get('/edit/{shipment}', [ShipmentsController::class, 'edit'])->name('shipments.edit');
        Route::post('/update/{shipment}', [ShipmentsController::class, 'update'])->name('shipments.update');
        Route::post('/delete/{shipment}', [ShipmentsController::class, 'destroy'])->name('shipments.destroy');
    });

});

Route::middleware(['cek_login:admin'])->prefix('dashboard/admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// =======================
// Managemen User oleh Admin
// =======================
// Route::middleware(['cek_login:admin'])->prefix('dashboard/admin')->group(function () {

//         Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
//         Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
//         Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
// });
