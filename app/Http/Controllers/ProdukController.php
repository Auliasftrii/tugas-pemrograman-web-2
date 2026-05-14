<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Kategori;
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
            'title' => 'Tambah Produk',
            'kategoris' => Kategori::all(),
            'brands' => Brand::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'kode_produk' => 'required|max:255',
            'kategori_id' => 'required',
            'brand_id' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'kode_produk.required' => 'Kode produk wajib diisi',
            'kategori_id.required' => 'Kategori wajib dipilih',
            'brand_id.required' => 'Brand wajib dipilih',
            'stok.required' => 'Stok wajib diisi',
            'harga.required' => 'Harga wajib diisi',
        ]);

        Produk::create($validated);

        return to_route('produk.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'title' => 'Edit Produk',
            'produk' => $produk,
            'kategoris' => Kategori::all()
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|max:255',
            'kode_produk' => 'required|max:255',
            'kategori_id' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'kode_produk.required' => 'Kode produk wajib diisi',
            'kategori_id.required' => 'Kategori wajib dipilih',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus angka',
            'harga.required' => 'Harga wajib diisi',
            'harga.integer' => 'Harga harus angka',
        ]);

        $produk->update($validated);

        return to_route('produk.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
    }
}