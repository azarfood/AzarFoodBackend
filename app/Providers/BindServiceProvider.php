<?php

namespace App\Providers;

use App\Services\Order\OrderHistory\OrderHistoryServiceConcrete;
use App\Services\Order\OrderHistory\OrderHistoryServiceInterface;
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
        $this->app->bind(
            OrderHistoryServiceInterface::class,
            OrderHistoryServiceConcrete::class
        );
    }
}
