<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->randomElement([
                'Lipstik',
                'Bedak',
                'Skincare',
                'Serum',
                'Foundation'
            ]),

            'kode_kategori' => 'KTG' . fake()->unique()->numberBetween(100, 999),

            'deskripsi' => fake()->randomElement([
                'Produk kecantikan bibir',
                'Produk perawatan wajah',
                'Kosmetik wanita',
                'Produk skincare',
                'Makeup dan kecantikan'
            ]),
        ];
    }
}