<?php

use App\Http\Controllers\Order\OrderHistoryController;
use App\Http\Controllers\User\ShowUserController;
use Illuminate\Support\Facades\Route;


Route::get('/me', ShowUserController::class)
    ->name('me');

Route::prefix('order')->name('order.')->group(function () {
    Route::get('history' , OrderHistoryController::class)->name('history');
});
