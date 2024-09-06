<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
        User::factory(20)->create();
    }
}
