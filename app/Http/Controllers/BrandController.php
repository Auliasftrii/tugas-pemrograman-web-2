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
            'brands' => $brands->paginate(2)->withQueryString(),
            'kategoris' => Kategori::groupBy('nama_kategori')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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