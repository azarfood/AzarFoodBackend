<?php

namespace App\DTO\Restaurant\Request;

use App\Models\Restaurant;

class RequestShowRestaurantDTO
{
    public function __construct(
        public readonly Restaurant $restaurant,
    )
    {
    }

    public static function fromRequest(
        Restaurant $restaurant
    ): self
    {
        return new self(
            restaurant: $restaurant
        );
    }
}
