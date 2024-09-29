<?php

namespace App\DTO\Food\Request;

readonly class RequestIndexAllFoodsDTO
{
    public function __construct(
        public ?string $q,
        public ?string $category,
        public ?string $collection,
        public ?int    $per_page,
        public ?int    $page,
    )
    {
    }

    public static function fromRequest(
        ?string $q,
        ?string $category,
        ?string $collection,
        ?int    $per_page,
        ?int    $page,
    ): self
    {
        return new self(
            q: $q,
            category: $category,
            collection: $collection,
            per_page: $per_page,
            page: $page,
        );
    }
}
