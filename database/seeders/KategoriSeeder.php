<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Lipstik',
            'kode_kategori' => 'KT001',
            'deskripsi' => 'Produk bibir'
        ]);

        Kategori::create([
            'nama_kategori' => 'Bedak',
            'kode_kategori' => 'KT002',
            'deskripsi' => 'Produk wajah'
        ]);

        Kategori::create([
            'nama_kategori' => 'Skincare',
            'kode_kategori' => 'KT003',
            'deskripsi' => 'Perawatan kulit'
        ]);
    }
}