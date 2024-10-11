<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
//        User::factory(20)->create();
        User::create([
            'student_code' => "4001830218" ,
            'type' => UserType::STUDENT_TYPE,
            'national_code' => "1363449001",
            'first_name' => "یوسف",
            'last_name' => "بصیری هیق نژاد",
            'password' => Hash::make('13821382'),
            'avatar_id' => rand(1, 5),
        ]);
        User::create([
            'student_code' => "4001830230" ,
            'type' => UserType::STUDENT_TYPE,
            'national_code' => "1231231212",
            'first_name' => "اسرا",
            'last_name' => "(عمروم)خلیق",
            'password' => Hash::make('13821382'),
            'avatar_id' => rand(1, 5),
        ]);
        User::create([
            'student_code' => "4001830241" ,
            'type' => UserType::STUDENT_TYPE,
            'national_code' => "1363142607",
            'first_name' => "سینا",
            'last_name' => "سلحشور",
            'password' => Hash::make('13821382'),
            'avatar_id' => rand(1, 5),
        ]);
    }
}
