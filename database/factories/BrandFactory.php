<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_brand' => fake()->randomElement([
                'Wardah',
                'Emina',
                'Make Over',
                'Implora',
                'Maybelline'
            ]),
            'kode_brand' => fake()->unique()->numerify('BR###'),
        ];
    }
}