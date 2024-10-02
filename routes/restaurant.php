<?php

use App\Http\Controllers\Food\IndexFoodController;
use App\Http\Controllers\Restaurant\IndexRestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('', IndexRestaurantController::class)->name('index');
Route::get('{restaurant}/foods', IndexFoodController::class)->name('foods.index');
