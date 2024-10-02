<?php

use App\Http\Controllers\Food\IndexAllFoodsController;
use App\Http\Controllers\Food\ShowFoodController;
use Illuminate\Support\Facades\Route;

Route::get('', IndexAllFoodsController::class)->name('index');
Route::get('{food}', ShowFoodController::class)->name('show');
