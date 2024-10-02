<?php

namespace App\Services\Food\IndexFood;

use App\DTO\Food\Request\RequestIndexFoodDTO;
interface IndexFoodServiceInterface
{
    public function index(RequestIndexFoodDTO $foodDTO): array;
}
