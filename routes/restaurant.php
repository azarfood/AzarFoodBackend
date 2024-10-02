<?php

use App\Http\Controllers\Food\IndexAllFoodsController;
use App\Http\Controllers\Food\IndexFoodController;
use App\Http\Controllers\Restaurant\IndexRestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('', IndexRestaurantController::class)->name('index');
Route::get('foods', IndexAllFoodsController::class)->name('all.foods.index');
Route::get('{restaurant}/foods', IndexFoodController::class)->name('foods.index');
