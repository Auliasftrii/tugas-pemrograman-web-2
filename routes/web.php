<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdukController::class, 'index']);

Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);