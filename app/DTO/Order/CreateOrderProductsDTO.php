<?php

namespace App\DTO\Order;

class CreateOrderProductsDTO
{
    public function __construct(
        public string $id,
        public int $count,
    )
    {
    }

    public static function fromRequest(
        string $id,
        int $count,
    ): self
    {
        return new self(
            id: $id,
            count: $count
        );
    }
}
