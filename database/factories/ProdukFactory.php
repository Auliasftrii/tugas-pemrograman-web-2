<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->word(),
            'kode_produk' => fake()->unique()->bothify('PRD###'),
            'kategori_id' => Kategori::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'stok' => fake()->numberBetween(10,100),
            'harga' => fake()->numberBetween(10000,150000),
        ];
    }
}
