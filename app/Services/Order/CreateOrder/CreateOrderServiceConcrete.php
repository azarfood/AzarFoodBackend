<?php

namespace App\Services\Order\CreateOrder;

use App\DTO\Order\CreateOrderProductsDTO;
use App\DTO\Order\OrderCartDTO;
use App\DTO\Order\OrderDTO;
use App\DTO\Order\OrderProductsDTO;
use App\DTO\Order\Request\RequestCreateOrderDTO;
use App\Enums\Meal;
use App\Enums\OrderArrivalTime;
use App\Enums\OrderStatus;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateOrderServiceConcrete implements CreateOrderServiceInterface
{
    public function create(RequestCreateOrderDTO $orderDTO): array
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = new Collection();
        DB::beginTransaction();
        try {
            /** @var OrderCartDTO $cart */
            foreach ($orderDTO->carts as $cart) {
                if (in_array($cart->time, OrderArrivalTime::FOR_LUNCH)) {
                    $meal = Meal::LUNCH;
                } elseif (in_array($cart->time, OrderArrivalTime::FOR_DINNER)) {
                    $meal = Meal::DINNER;
                } else {
                    throw new Exception("time must be instanceof meal Enum");
                }

                $total_cost = 0;

                /** @var CreateOrderProductsDTO $product */
                foreach ($cart->products as $product) {
                    $food = Food::find($product->id);
                    $total_cost += ($food->price * $product->count);
                }

                $order = Order::create([
                    'user_id' => $user->student_code,
                    'status' => OrderStatus::RESERVED,
                    'meal' => $meal,
                    'date' => $cart->order_date,
                    'total_cost' => $total_cost,
                    'place' => $cart->place,
                    'time' => $cart->time,
                ]);

                $orders->add($order);

                /** @var CreateOrderProductsDTO $product */
                foreach ($cart->products as $product) {
                    OrderProducts::create([
                        'product_id' => $product->id,
                        'order_id' => $order->id,
                        'count' => $product->count,
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

        $response = $orders->map(function (Order $order) {
            $orderProducts = $order->order_products;
            $products = $orderProducts->map(fn(OrderProducts $orderProduct) => OrderProductsDTO::fromModel(
                orderProducts: $orderProduct
            ));
            return OrderDTO::fromModel(
                order: $order, orderProducts: $products
            );
        });

        return $response->toArray();
    }
}
