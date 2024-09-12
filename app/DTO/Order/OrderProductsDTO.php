<?php

namespace App\DTO\Order;

use App\Models\OrderProducts;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class OrderProductsDTO
{
    public function __construct(
        public string $name,
        public int    $count,
        public int    $cost
    )
    {
    }

    public static function fromModel(OrderProducts $orderProducts): OrderProductsDTO
    {
        try {
            return new self(
                name: $orderProducts->food->template->name,
                count: $orderProducts->count,
                cost: $orderProducts->food->cost
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

