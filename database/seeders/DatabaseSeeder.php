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
        Kategori::factory(20)->create();
        Brand::factory(15)->create();
        Produk::factory(50)->create();
    }
}