<?php

use App\Http\Controllers\User\ShowUserController;
use Illuminate\Support\Facades\Route;


Route::get('/me', ShowUserController::class)
    ->name('me');
