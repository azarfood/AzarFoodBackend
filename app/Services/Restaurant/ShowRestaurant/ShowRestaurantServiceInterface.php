<?php

namespace App\Services\Restaurant\ShowRestaurant;

use App\DTO\Restaurant\Request\RequestShowRestaurantDTO;
use App\DTO\Restaurant\RestaurantDTO;

interface ShowRestaurantServiceInterface
{
    public function show(RequestShowRestaurantDTO $restaurantDTO): RestaurantDTO;
}
