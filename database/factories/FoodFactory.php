<?php

namespace Database\Factories;

use App\Models\FoodTemplate;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "cost"=>rand(60,200)*1000,
            "restaurant_id"=>Restaurant::all()->random()->id,
            "template_id"=>FoodTemplate::all()->random()->id,
        ];
    }
}
