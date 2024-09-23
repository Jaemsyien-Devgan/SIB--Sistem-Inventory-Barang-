<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SatuanController;
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
    Route::get('/Product', [ProductController::class, 'index'])->name('product');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');


    Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::delete('/satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
    Route::get('/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');





});

require __DIR__.'/auth.php';
