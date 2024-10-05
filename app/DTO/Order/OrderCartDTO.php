<?php

namespace App\DTO\Order;

readonly class OrderCartDTO
{
    public function __construct(
        public string $order_date,
        public string $time,
        public string $place,
        public array  $products,
    )
    {
        foreach ($this->products as $product) {
            if (!$product instanceof CreateOrderProductsDTO) {
                throw new \InvalidArgumentException('All carts must be instances of OrderProductsDTO');
            }
        }
    }

    public static function fromRequest(
        string $order_date,
        string $time,
        string $place,
        array  $products,
    ): self
    {
        return new self(
            order_date: $order_date,
            time: $time,
            place: $place,
            products: $products
        );
    }
}
