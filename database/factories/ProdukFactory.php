<?php

namespace Database\Factories;

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
            'nama_produk' => fake()->name(),
            'kode_produk' => fake()->numerify('PRD###'),
            'kategori' => fake()->name(),
            'stok' => fake()->numberBetween(1, 100),
            'harga' => fake()->numberBetween(10000, 100000),
        ];
    }
}
