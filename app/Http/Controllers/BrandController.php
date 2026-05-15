<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brand::with('kategori')->latest();

        if ($request->keyword) {
            $brands->where('nama_brand', 'like', '%' . $request->keyword . '%')
                ->orWhere('kode_brand', 'like', '%' . $request->keyword . '%');
        }

        if ($request->kategori) {
            $brands->where('kategori_id', $request->kategori);
        }

        return view('brand.index', [
            'title' => 'Brand',
            'brands' => $brands->paginate(5)->withQueryString(),
            'kategoris' => Kategori::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create', [
            'title' => 'Tambah Brand',
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_brand' => 'required|min:3|max:255',
            'kode_brand' => 'required|unique:brands,kode_brand',
            'jenis_brand' => 'required|string|max:255',
            'stok_brand' => 'required|numeric',
        ], [
            'kategori_id.required' => 'Pilih kategori terlebih dahulu',
            'nama_brand.required' => 'Nama brand tidak boleh kosong',
            'nama_brand.min' => 'Nama brand minimal 3 karakter',
            'kode_brand.required' => 'Kode brand wajib diisi',
            'kode_brand.unique' => 'Kode brand sudah ada',
            'jenis_brand.required' => 'Jenis brand wajib diisi',
            'stok_brand.required' => 'Stok brand wajib diisi',
        ]);

        Brand::create($validated);

        return redirect()->route('brand.index')->withSuccess('Data brand berhasil disimpan');
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
    public function edit(Brand $brand)
    {
        return view('brand.edit', [
            'title' => 'Edit Brand',
            'brand' => $brand,
            'kategoris' => Kategori::all()
        ]);
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'nama_brand' => 'required|min:3|max:255',
            'kode_brand' => 'required|unique:brands,kode_brand,' . $brand->id,
            'jenis_brand' => 'required|string|max:255',
            'stok_brand' => 'required|numeric',
        ], [
            'kategori_id.required' => 'Pilih kategori terlebih dahulu',
            'nama_brand.required' => 'Nama brand tidak boleh kosong',
            'nama_brand.min' => 'Nama brand minimal 3 karakter',
            'kode_brand.required' => 'Kode brand wajib diisi',
            'kode_brand.unique' => 'Kode brand sudah ada',
            'jenis_brand.required' => 'Jenis brand wajib diisi',
            'stok_brand.required' => 'Stok brand wajib diisi',
        ]);

        $brand->update($validated);

        return redirect()->route('brand.index')->withSuccess('Data brand berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

    return redirect()->route('brand.index')
        ->withSuccess('Data brand berhasil dihapus');
    }
}