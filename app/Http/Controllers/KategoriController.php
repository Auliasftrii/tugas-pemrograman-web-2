<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
    $kategoris = Kategori::latest();

        if ($request->keyword) {
            $kategoris->where('nama_kategori', 'like', '%' . $request->keyword . '%')
                ->orWhere('kode_kategori', 'like', '%' . $request->keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $request->keyword . '%');
        }

        return view('kategori.index', [
            'title' => 'Kategori',
            'kategoris' => $kategoris->paginate(3)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('kategori.create', [
            'title' => 'Tambah Kategori'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'kode_kategori' => 'required|string|unique:kategoris,kode_kategori',
            'deskripsi' => 'required|string',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'kode_kategori.required' => 'Kode kategori wajib diisi',
            'kode_kategori.unique' => 'Kode kategori sudah ada',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        Kategori::create($validated);

        return to_route('kategori.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function show(Kategori $kategori)
    {
        return view('kategori.show', [
            'title' => 'Detail Kategori',
            'kategori' => $kategori
        ]);
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'kode_kategori' => 'required|max:255',
            'deskripsi' => 'required|max:255',
        ], [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'kode_kategori.required' => 'Kode kategori wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        $kategori->update($validated);

        return to_route('kategori.index')->withSuccess('Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return to_route('kategori.index')->withSuccess('Kategori berhasil dihapus');
    }
}