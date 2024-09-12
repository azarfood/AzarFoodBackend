<?php

namespace App\Services\Order\OrderList;

use App\DTO\Pagination\Pagination;

interface OrderListServiceInterface
{
    public function index(): Pagination;
}
