<?php

use App\Enums\FoodCategory;
use App\Enums\FoodType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food_templates', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("image");
            $table->string("description");
            $table->enum("type" , FoodType::TYPES);
            $table->enum("category" , FoodCategory::CATEGORIES);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_templates');
    }
};
