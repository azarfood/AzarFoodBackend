<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware(['api'])
                ->prefix('api/auth')
                ->name('auth.')
                ->group(base_path('routes/auth.php'));

            Route::middleware(['auth:sanctum', 'api'])
                ->prefix('api/user')
                ->name('user.')
                ->group(base_path('routes/user.php'));

            Route::middleware(['auth:sanctum', 'api'])
                ->prefix('api/restaurant')
                ->name('restaurant.')
                ->group(base_path('routes/restaurant.php'));

            Route::middleware(['auth:sanctum', 'api'])
                ->prefix('api/food')
                ->name('food.')
                ->group(base_path('routes/food.php'));
        });
    }
}
