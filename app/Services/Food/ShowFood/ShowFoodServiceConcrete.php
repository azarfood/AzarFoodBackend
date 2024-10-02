<?php

namespace App\Services\Food\ShowFood;

use App\DTO\Food\FoodDTO;
use App\DTO\Food\Request\RequestShowFoodDTO;

class ShowFoodServiceConcrete implements ShowFoodServiceInterface
{
    public function show(RequestShowFoodDTO $foodDTO): FoodDTO
    {
        return FoodDTO::fromModel($foodDTO->food);
    }
}
