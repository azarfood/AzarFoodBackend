<?php

namespace Database\Factories;

use App\Enums\TransactionType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            "user_id" => User::all()->random()->student_code,
            "date" => Carbon::now()->addHours(rand(0,1000))->timestamp,
            'amount' => rand(100, 500) * 1000,
            'type' => TransactionType::TYPES[rand(0, count(TransactionType::TYPES)- 1) ],
        ];
    }
}
