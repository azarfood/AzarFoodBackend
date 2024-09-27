<?php

use App\Http\Controllers\Restaurant\IndexRestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('' , IndexRestaurantController::class)->name('index');
