<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_kategori' => fake()->randomElement([
                'Lip Tint',
                'Foundation',
                'Powder',
                'Mascara',
                'Skincare'
            ]),
        ];
    }
}