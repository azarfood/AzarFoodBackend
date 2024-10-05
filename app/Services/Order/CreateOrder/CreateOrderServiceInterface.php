<?php

namespace App\Services\Order\CreateOrder;

use App\DTO\Order\OrderDTO;
use App\DTO\Order\Request\RequestCreateOrderDTO;

interface CreateOrderServiceInterface
{
    public function create(RequestCreateOrderDTO $orderDTO): array;
}
