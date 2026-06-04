<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::factory(5)->create();
        Brand::factory(10)->create();
        Produk::factory(50)->create();
    }
}