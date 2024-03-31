<?php

namespace Database\Factories;

use App\Components\Category\Domain\Model\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->colorName(),
            'is_visible' => fake()->boolean(),
        ];
    }
}
