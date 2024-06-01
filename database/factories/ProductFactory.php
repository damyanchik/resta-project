<?php

namespace Database\Factories;

use App\Components\Product\Domain\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
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
            'rate' => fake()->numberBetween(2, 23),
            'is_vegetarian' => fake()->numberBetween(0,1),
            'is_spicy' => fake()->numberBetween(0,1),
            'is_unlimited' => fake()->numberBetween(0,1),
            'is_available' => 1,
            'category_uuid' => null,
        ];
    }
}
