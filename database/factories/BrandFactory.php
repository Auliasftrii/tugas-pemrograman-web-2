<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kategori_id' => Kategori::inRandomOrder()->first()->id,
            'nama_brand' => fake()->company(),
            'kode_brand' => 'BRD' . fake()->unique()->numberBetween(100, 999),
            'jenis_brand' => fake()->randomElement(['Lokal', 'Internasional']),
            'stok_brand' => fake()->numberBetween(10, 200),
        ];
    }
}