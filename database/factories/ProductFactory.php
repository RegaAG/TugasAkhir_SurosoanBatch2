<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => random_int(000,999),
            'name' => fake()->catchPhrase(),
            'price' => random_int(1000000,10000000),
            'category' => fake()->catchPhrase(),
        ];
    }
}
