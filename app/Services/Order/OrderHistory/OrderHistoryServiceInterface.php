<?php

namespace App\Services\Order\OrderHistory;

use App\DTO\Pagination\Pagination;

interface OrderHistoryServiceInterface
{
    public function index(): Pagination;
}
