<?php

namespace App\DTO\Food\Request;

use App\Models\Restaurant;

readonly class RequestIndexFoodDTO
{
    public function __construct(
        public Restaurant $restaurant,
        public ?string    $q,
        public ?string    $category,
        public ?string    $collection,
        public ?int       $per_page,
        public ?int       $page,
    )
    {
    }

    public static function fromRequest(
        Restaurant $restaurant,
        ?string    $q,
        ?string    $category,
        ?string    $collection,
        ?int       $per_page,
        ?int       $page,
    ): self
    {
        return new self(
            restaurant: $restaurant,
            q: $q,
            category: $category,
            collection: $collection,
            per_page: $per_page,
            page: $page,
        );
    }
}
