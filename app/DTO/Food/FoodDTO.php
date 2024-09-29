<?php

namespace App\DTO\Food;

use App\DTO\Restaurant\RestaurantDTO;
use App\Models\Food;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class FoodDTO
{
    public function __construct(
        public string        $id,
        public string        $name,
        public ?string       $rating,
        public string        $image,
        public RestaurantDTO $restaurant,
        public string        $description,
    )
    {
    }

    public static function fromModel(Food $food): FoodDTO
    {
        try {
            return new self(
                id: $food->id,
                name: $food->template->name,
                rating: $food->rating,
                image: $food->template->image,
                restaurant: RestaurantDTO::fromModel($food->restaurant),
                description: $food->template->description,
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

