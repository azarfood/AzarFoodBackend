<?php

namespace App\DTO\Order\Request;

use App\DTO\Order\OrderCartDTO;

readonly class RequestCreateOrderDTO
{
    public function __construct(
        public array $carts,
    )
    {
        foreach ($this->carts as $cart) {
            if (!$cart instanceof OrderCartDTO) {
                throw new \InvalidArgumentException('All carts must be instances of OrderCartDTO');
            }
        }
    }

    public static function fromRequest(
        array $carts,
    ): self
    {
        return new self(
            carts: $carts
        );
    }
}
