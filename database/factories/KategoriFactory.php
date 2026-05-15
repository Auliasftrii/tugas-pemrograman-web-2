<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->randomElement([
                'Kosmetik', 'Skincare', 'Makanan', 'Minuman', 'Elektronik'
            ]),
            'kode_kategori' => 'KTG' . fake()->unique()->numberBetween(100, 999),
            'deskripsi' => fake()->sentence(),
        ];
    }
}