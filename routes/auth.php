<?php

use App\Http\Controllers\Auth\AuthenticatedController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthenticatedController::class, 'store'])
    ->middleware("guest")
    ->name('login');

Route::post('logout', [AuthenticatedController::class, 'destroy'])
    ->middleware("auth:sanctum")
    ->name('logout');

