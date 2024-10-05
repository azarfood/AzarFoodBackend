<?php

use App\Enums\Meal;
use App\Enums\OrderArrivalTime;
use App\Enums\OrderStatus;
use App\Enums\Place;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->enum("status", OrderStatus::STATUSES);
            $table->enum("meal", Meal::MEALS);
            $table->integer("date");
            $table->enum("place" , Place::PLACES);
            $table->enum("time" , OrderArrivalTime::TIMES);
            $table->integer("total_cost");
            $table->integer("rating")->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('student_code')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
