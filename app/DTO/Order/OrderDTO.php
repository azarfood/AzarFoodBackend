<?php

namespace App\DTO\Order;

use App\Models\Order;
use Illuminate\Support\Collection;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class OrderDTO
{
    public function __construct(
        public string     $id,
        public string     $date,
        public int        $total_cost,
        public string     $status,
        public string     $meal,
        public Collection $orderProducts
    )
    {
    }

    /**
     * @param Order $order
     * @param Collection<OrderProductsDTO> $orderProducts
     * @return OrderDTO
     */
    public static function fromModel(Order $order, Collection $orderProducts): OrderDTO
    {
        try {
            return new self(
                id: $order->id,
                date: $order->date,
                total_cost: $order->totalCost,
                status: $order->status,
                meal: $order->meal,
                orderProducts: $orderProducts
            );
        } catch (UnknownProperties $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
}

