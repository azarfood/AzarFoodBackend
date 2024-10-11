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
        public string        $price,
        public ?string       $rating,
        public string        $image,
        public RestaurantDTO $restaurant,
        public string        $ingredients,
    )
    {
    }

    public static function fromModel(Food $food): FoodDTO
    {
        try {
            return new self(
                id: $food->id,
                name: $food->template->name,
                price: $food->cost,
                rating: $food->rating,
                image: asset($food->template->image),
                restaurant: RestaurantDTO::fromModel($food->restaurant),
                ingredients: $food->template->description,
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

