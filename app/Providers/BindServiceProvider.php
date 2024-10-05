<?php

namespace App\Providers;

use App\Services\Food\IndexAllFoods\IndexAllFoodsServiceConcrete;
use App\Services\Food\IndexAllFoods\IndexAllFoodsServiceInterface;
use App\Services\Food\IndexFood\IndexFoodServiceConcrete;
use App\Services\Food\IndexFood\IndexFoodServiceInterface;
use App\Services\Food\ShowFood\ShowFoodServiceConcrete;
use App\Services\Food\ShowFood\ShowFoodServiceInterface;
use App\Services\Order\CreateOrder\CreateOrderServiceConcrete;
use App\Services\Order\CreateOrder\CreateOrderServiceInterface;
use App\Services\Order\OrderHistory\OrderHistoryServiceConcrete;
use App\Services\Order\OrderHistory\OrderHistoryServiceInterface;
use App\Services\Order\OrderList\OrderListServiceConcrete;
use App\Services\Order\OrderList\OrderListServiceInterface;
use App\Services\Restaurant\IndexRestaurant\IndexRestaurantServiceConcrete;
use App\Services\Restaurant\IndexRestaurant\IndexRestaurantServiceInterface;
use App\Services\Restaurant\ShowRestaurant\ShowRestaurantServiceConcrete;
use App\Services\Restaurant\ShowRestaurant\ShowRestaurantServiceInterface;
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
        $this->app->bind(
            IndexAllFoodsServiceInterface::class,
            IndexAllFoodsServiceConcrete::class
        );
        $this->app->bind(
            IndexFoodServiceInterface::class,
            IndexFoodServiceConcrete::class
        );
        $this->app->bind(
            ShowRestaurantServiceInterface::class,
            ShowRestaurantServiceConcrete::class
        );
        $this->app->bind(
            ShowFoodServiceInterface::class,
            ShowFoodServiceConcrete::class
        );
        $this->app->bind(
            CreateOrderServiceInterface::class,
            CreateOrderServiceConcrete::class
        );
    }
}
