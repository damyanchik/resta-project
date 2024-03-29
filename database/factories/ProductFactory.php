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
            'name' => fake()->word(),
            'description' => fake()->text(),
            'stock' => fake()->numberBetween(0, 80),
            'price' => fake()->numberBetween(250, 8000),
            'is_vegetarian' => fake()->numberBetween(0,1),
            'is_spicy' => fake()->numberBetween(0,1),
            'is_unlimited' => fake()->numberBetween(0,1),
            'is_available' => fake()->numberBetween(0,1),
            'category_id' => fake()->numberBetween(1,10),
        ];
    }
}
