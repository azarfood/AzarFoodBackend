<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProducts>
 */
class OrderProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=>Order::all()->random()->id,
            'product_id'=>Food::all()->random()->id,
            'count'=>rand(1,3),
        ];
    }
}
