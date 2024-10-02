<?php

namespace App\DTO\Food\Request;

use App\Models\Food;

class RequestShowFoodDTO
{
    public function __construct(
        public readonly Food $food,
    )
    {
    }

    public static function fromRequest(
        Food $food
    ): self
    {
        return new self(
            food: $food
        );
    }
}
