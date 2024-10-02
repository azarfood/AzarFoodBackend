<?php

use App\Http\Controllers\Food\IndexAllFoodsController;
use Illuminate\Support\Facades\Route;

Route::get('', IndexAllFoodsController::class)->name('index');
