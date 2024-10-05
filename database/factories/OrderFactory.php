<?php

namespace Database\Factories;

use App\Enums\Meal;
use App\Enums\OrderArrivalTime;
use App\Enums\OrderStatus;
use App\Enums\Place;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => User::all()->random()->student_code,
            "status" => OrderStatus::STATUSES[rand(0, count(OrderStatus::STATUSES) - 1)],
            "meal" => Meal::MEALS[rand(0, count(Meal::MEALS)- 1) ],
            "place" => Place::PLACES[rand(0, count(Place::PLACES)- 1) ],
            "time" => OrderArrivalTime::TIMES[rand(0, count(OrderArrivalTime::TIMES)- 1) ],
            "date" => Carbon::now()->timestamp,
            "total_cost" => rand(100, 500) * 1000,
            "rating" => rand(1, 5),
        ];
    }
}
