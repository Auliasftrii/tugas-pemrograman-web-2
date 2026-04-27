<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function () {
    return view('produk.index', ['title' => 'Data Produk']);
});

Route::get('/produk/create', function () {
    return view('produk.create', ['title' => 'Create Produk']);
});