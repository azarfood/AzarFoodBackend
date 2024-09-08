<?php

namespace App\Providers;

use App\Services\User\ShowUser\ShowUserServiceConcrete;
use App\Services\User\ShowUser\ShowUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(
            ShowUserServiceInterface::class,
            ShowUserServiceConcrete::class
        );
    }
}
