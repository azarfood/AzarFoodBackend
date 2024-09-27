<?php

namespace App\Providers;

use App\Services\Order\OrderHistory\OrderHistoryServiceConcrete;
use App\Services\Order\OrderHistory\OrderHistoryServiceInterface;
use App\Services\Order\OrderList\OrderListServiceConcrete;
use App\Services\Order\OrderList\OrderListServiceInterface;
use App\Services\Restaurant\IndexRestaurant\IndexRestaurantServiceConcrete;
use App\Services\Restaurant\IndexRestaurant\IndexRestaurantServiceInterface;
use App\Services\Transaction\TransactionHistory\TransactionHistoryServiceConcrete;
use App\Services\Transaction\TransactionHistory\TransactionHistoryServiceInterface;
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
        $this->app->bind(
            OrderListServiceInterface::class,
            OrderListServiceConcrete::class
        );
        $this->app->bind(
            TransactionHistoryServiceInterface::class,
            TransactionHistoryServiceConcrete::class
        );
        $this->app->bind(
            IndexRestaurantServiceInterface::class,
            IndexRestaurantServiceConcrete::class
        );
    }
}
