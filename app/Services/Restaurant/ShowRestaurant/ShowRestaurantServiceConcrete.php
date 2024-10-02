<?php

namespace App\Services\Restaurant\ShowRestaurant;

use App\DTO\Restaurant\Request\RequestShowRestaurantDTO;
use App\DTO\Restaurant\RestaurantDTO;

class ShowRestaurantServiceConcrete implements ShowRestaurantServiceInterface
{
    public function show(RequestShowRestaurantDTO $restaurantDTO): RestaurantDTO
    {
        return RestaurantDTO::fromModel($restaurantDTO->restaurant);
    }
}
