<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LPBController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SubAnggaranController;
use App\Http\Controllers\SubLpbController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Administrasi;
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
    Route::post('/LPB/add', [LPBController::class, 'store'])->name('LPB.Lpb.store');
    Route::get('/LPB/create', [LPBController::class, 'create'])->name('LPB.lpb.create');
    Route::delete('/LPB/{lpb}', [LPBController::class, 'destroy'])->name('LPB.lpb.destroy');
    Route::get('/LPB/{id}/edit', [LPBController::class, 'edit'])->name('LPB.lpb.edit');
    Route::get('/LPB/{id}', [LPBController::class, 'show'])->name('LPB.lpb_show');
    Route::put('/LPB/{id}', [LPBController::class, 'update'])->name('LPB.update');

    Route::post('/sub_lpb/store', [SubLpbController::class, 'store'])->name('LPB.sub_lpb.store');
    Route::get('/sub_lpb/{id}', [SubLpbController::class, 'index'])->name('LPB.sub_lpb');
    Route::delete('/sub_lpb/{subLpb}', [SubLpbController::class, 'destroy'])->name('LPB.sub_lpb.destroy');
    Route::get('/sub_lpb/{id}/edit', [SubLpbController::class, 'edit'])->name('LPB.sub_lpb.edit');
    Route::put('/sub_lpb/{id}', [SubLpbController::class, 'update'])->name('LPB.sub_lpb.update');


    Route::get('/Administrasi', [AdministrasiController::class, 'index'])->name('Administrasi.administrasi');
    Route::post('/Administrasi/add', [AdministrasiController::class, 'store'])->name('Administrasi.administrasi.store');
    Route::get('/Administrasi/create', [AdministrasiController::class, 'create'])->name('Administrasi.administrasi.create');
    Route::delete('/Administrasi/{administrasi}', [AdministrasiController::class, 'destroy'])->name('Administrasi.administrasi.destroy');
    Route::get('/Administrasi/{id}/edit', [AdministrasiController::class, 'edit'])->name('Administrasi.administrasi.edit');
    Route::get('/Administrasi/{id}', [AdministrasiController::class, 'show'])->name('Administrasi.show');
    Route::put('/Administrasi/{id}', [AdministrasiController::class, 'update'])->name('Administrasi.update');

    Route::post('/sub_anggaran/store', [SubAnggaranController::class, 'store'])->name('Administrasi.sub_anggaran.store');
    Route::get('/sub_anggaran/{id}', [SubAnggaranController::class, 'index'])->name('Administrasi.sub_anggaran');
    Route::delete('/sub_anggaran/{subAnggaran}', [SubAnggaranController::class, 'destroy'])->name('Administrasi.sub_anggaran.destroy');
    Route::get('/sub_anggaran/{id}/edit', [SubAnggaranController::class, 'edit'])->name('Administrasi.sub_anggaran.edit');
    Route::put('/sub_anggaran/{id}', [SubAnggaranController::class, 'update'])->name('Administrasi.sub_anggaran.update');



    Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran.index');
    Route::get('/anggaran/create', [AnggaranController::class, 'create'])->name('anggaran.create');
    Route::post('/anggaran', [AnggaranController::class, 'store'])->name('anggaran.store');
    Route::delete('/anggaran/{anggaran}', [AnggaranController::class, 'destroy'])->name('anggaran.destroy');
    Route::get('/anggaran/{id}/edit', [AnggaranController::class, 'edit'])->name('anggaran.edit');
    Route::put('/anggaran/{id}', [AnggaranController::class, 'update'])->name('anggaran.update');


    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');

    Route::get('/item', [ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::delete('/item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/item/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

});

require __DIR__.'/auth.php';
