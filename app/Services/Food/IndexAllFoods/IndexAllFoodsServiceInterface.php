<?php

namespace App\Services\Food\IndexAllFoods;

use App\DTO\Food\Request\RequestIndexAllFoodsDTO;

interface IndexAllFoodsServiceInterface
{
    public function index(RequestIndexAllFoodsDTO $allFoodsDTO): array;
}
