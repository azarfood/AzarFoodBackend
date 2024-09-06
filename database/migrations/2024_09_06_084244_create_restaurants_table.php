<?php

use App\Enums\RestaurantStatus;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("location");
            $table->string("logo");
            $table->string("description");
            $table->string("address");
            $table->string("phone");
            $table->string("mobile_number");
            $table->integer("reserve_capacity");
            $table->enum("status", RestaurantStatus::TYPES)->default(RestaurantStatus::Inactive);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
