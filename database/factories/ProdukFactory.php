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
            'nama_produk' => fake()->word(),
            'kode_produk' => 'PRD' . fake()->unique()->numberBetween(100, 999),
            'stok' => fake()->numberBetween(1, 100),
            'harga' => fake()->numberBetween(10000, 200000),
        ];
    }
}
