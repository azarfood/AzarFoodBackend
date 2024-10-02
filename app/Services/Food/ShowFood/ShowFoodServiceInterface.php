<?php

namespace App\Services\Food\ShowFood;

use App\DTO\Food\FoodDTO;
use App\DTO\Food\Request\RequestShowFoodDTO;

interface ShowFoodServiceInterface
{
    public function show(RequestShowFoodDTO $foodDTO): FoodDTO;
}
