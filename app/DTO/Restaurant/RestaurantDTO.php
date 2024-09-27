<?php

namespace App\DTO\Restaurant;

use App\Models\Restaurant;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RestaurantDTO
{
    public function __construct(
        public string  $id,
        public string  $name,
        public ?string $rating,
        public string  $image,
        public ?string $banner_url,
        public string  $address,
    )
    {
    }

    public static function fromModel(Restaurant $restaurant): RestaurantDTO
    {
        try {
            return new self(
                id: $restaurant->id,
                name: $restaurant->name,
                rating: $restaurant->rating,
                image: $restaurant->logo,
                banner_url: $restaurant->banner_url,
                address: $restaurant->address,
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

