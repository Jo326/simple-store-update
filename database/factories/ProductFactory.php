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
            'nama' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'retail_price' => $this->faker->randomFloat(2, 10000, 50000),
            'wholesale_price' => $this->faker->randomFloat(2, 9000, 45000),
            'min_wholesale_qty' => $this->faker->numberBetween(10, 100),
            'quantity' => $this->faker->numberBetween(10, 1000),
        ];
    }
}
