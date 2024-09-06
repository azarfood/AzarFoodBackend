<?php

namespace Database\Seeders;

use App\Models\OrderProducts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call(UserSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(FoodTemplateSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderProductsSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
