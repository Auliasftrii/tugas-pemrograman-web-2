<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/', [ProdukController::class, 'index']);

Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);
Route::get('/brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
Route::put('/brand/{id}/restore', [BrandController::class, 'restore'])->name('brand.restore');
Route::resource('brand', BrandController::class);