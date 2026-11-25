<?php

namespace Database\Factories;

use App\Models\Shipper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Shipper>
 */
class ShipperFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->unique()->company(),
        ];
    }
}
