<?php

namespace App\DTO\Transaction\Request;

readonly class RequestTransactionHistoryDTO
{
    public function __construct(
        public ?int $per_page,
        public ?int $page,
        public ?int $dateFrom,
        public ?int $dateTo,
    )
    {
    }

    public static function fromRequest(
        ?int $per_page,
        ?int $page,
        ?int $dateFrom,
        ?int $dateTo,
    ): self
    {
        return new self(
            per_page: $per_page,
            page: $page,
            dateFrom: $dateFrom,
            dateTo: $dateTo,
        );
    }
}
