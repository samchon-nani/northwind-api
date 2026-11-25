<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'code' => fake()->unique()->bothify('TEST-####'),
            'name' => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 1, 100),
        ];
    }
}
