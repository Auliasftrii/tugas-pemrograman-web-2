<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index', [
            'title' => 'Data Produk',
            'produks' => Produk::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('produk.create', [
            'title' => 'Tambah Produk'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'kode_produk' => 'required|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ]);

        Produk::create($validated);

        return to_route('produk.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'title' => 'Edit Produk',
            'produk' => $produk,
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'kode_produk' => 'required|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return to_route('produk.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return to_route('produk.index')->withSuccess('Data berhasil dihapus');
    }
}