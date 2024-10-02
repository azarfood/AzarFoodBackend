<?php

use App\Http\Controllers\Food\IndexFoodController;
use App\Http\Controllers\Restaurant\IndexRestaurantController;
use App\Http\Controllers\Restaurant\ShowRestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('', IndexRestaurantController::class)->name('index');
Route::get('{restaurant}' , ShowRestaurantController::class)->name('show');
Route::get('{restaurant}/foods', IndexFoodController::class)->name('foods.index');
