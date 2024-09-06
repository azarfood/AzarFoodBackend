<?php

namespace Database\Factories;

use App\Enums\RestaurantStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->title,
            "location" => "location",
            "logo" => "logo",
            "description" => fake()->text,
            "address" => fake()->text,
            "phone" => fake()->phoneNumber,
            "mobile_number" => fake()->phoneNumber,
            "reserve_capacity" => rand(0, 100),
            "status" => RestaurantStatus::TYPES[rand(0, count(RestaurantStatus::TYPES) - 1)],
        ];
    }
}
