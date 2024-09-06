<?php

namespace Database\Factories;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'student_code' => "400" . rand(1000000, 9999999),
            'type' => UserType::TYPES[rand(0, count(UserType::TYPES) - 1)],
            'national_code' => "136" . rand(1000000, 9999999),
            'first_name' => fake()->name,
            'last_name' => fake()->name,
            'password' => static::$password ??= Hash::make('13821382'),
            'avatar_id' => rand(1, 5),
        ];
    }
}
