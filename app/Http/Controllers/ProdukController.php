<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk.index', [
            'title' => 'Data Produk',
            'produks' => Produk::latest()->get(),
            //'produks' => Produk::orderBy('nama_produk', 'asc')->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'title' => 'Tambah Produk'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_produk' => 'required|max:255',
        'kode_produk' => 'required|max:255',
        'kategori' => 'required|max:255',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|integer|min:0',
    ], [
        'nama_produk.required' => 'Nama produk wajib diisi',
        'kode_produk.required' => 'Kode produk wajib diisi',
        'kategori.required' => 'Kategori wajib diisi',
        'stok.required' => 'Stok wajib diisi',
        'stok.integer' => 'Stok harus angka',
        'harga.required' => 'Harga wajib diisi',
        'harga.integer' => 'Harga harus angka',
    ]);

        Produk::create($validated);
        return to_route('produk.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
