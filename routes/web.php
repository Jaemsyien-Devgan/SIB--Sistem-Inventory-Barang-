<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LPBController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // User ADD
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::post('/admin/add', [UserController::class, 'store'])->name('admin.store');
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin.create');
    Route::delete('/admin/{admin}', [UserController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [UserController::class, 'update'])->name('admin.update');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::delete('/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
    Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');

    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::post('/proyek/add', [ProyekController::class, 'store'])->name('proyek.store');
    Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
    Route::delete('/proyek/{proyek}', [ProyekController::class, 'destroy'])->name('proyek.destroy');
    Route::get('/proyek/{id}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::put('/proyek/{id}', [ProyekController::class, 'update'])->name('proyek.update');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
    Route::post('/supplier/add', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');

    Route::get('/Product', [ProductController::class, 'index'])->name('product');
    Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/LPB', [LPBController::class, 'index'])->name('lpb');

    Route::get('/Administrasi', [AdministrasiController::class, 'index'])->name('Administrasi.administrasi');
    Route::post('/Administrasi/add', [AdministrasiController::class, 'store'])->name('Administrasi.administrasi.store');
    Route::get('/Administrasi/create', [AdministrasiController::class, 'create'])->name('Administrasi.administrasi.create');
    Route::delete('/Administrasi/{administrasi}', [AdministrasiController::class, 'destroy'])->name('Administrasi.administrasi.destroy');
    Route::get('/Administrasi/{id}/edit', [AdministrasiController::class, 'edit'])->name('Administrasi.administrasi.edit');

});

require __DIR__.'/auth.php';
