<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::latest();

        $keyword = request('keyword');

        if ($keyword) {
            $kategoris->where('nama_kategori', 'like', '%' . $keyword . '%')
                    ->orWhere('kode_kategori', 'like', '%' . $keyword . '%');
        }

        return view('kategori.index', [
            'title' => 'Kategori',
            'kategoris' => $kategoris->paginate(2)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create', [
            'title' => 'Tambah Kategori'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
