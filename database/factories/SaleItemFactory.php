<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleItem>
 */
class SaleItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $qty = $this->faker->numberBetween(1, 10);
        $price = $this->faker->randomFloat(2, 10000, 100000);
        $subtotal = $qty * $price;

        return [
            'sale_id' => \App\Models\Sale::factory(),
            'product_id' => \App\Models\Product::factory(),
            'qty' => $qty,
            'price' => $price,
            'subtotal' => $subtotal,
        ];
    }
}
