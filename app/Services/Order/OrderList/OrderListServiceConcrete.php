<?php

namespace App\Services\Order\OrderList;

use App\DTO\Order\OrderDTO;
use App\DTO\Order\OrderProductsDTO;
use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderListServiceConcrete implements OrderListServiceInterface
{
    public function index(): array
    {
        /** @var User $user */
        $user = Auth::user();
        $userOrders = $user->orders()
            ->byStatus(OrderStatus::RESERVED)
            ->paginate(5);

        $orders = $userOrders->map(function (Order $order) {
            $orderProducts = $order->order_products;
            $products = $orderProducts->map(fn(OrderProducts $orderProduct) => OrderProductsDTO::fromModel(
                orderProducts: $orderProduct
            ));
            return OrderDTO::fromModel(
                order: $order, orderProducts: $products
            );
        });
        return $orders->toArray();
    }
}
