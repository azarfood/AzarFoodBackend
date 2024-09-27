<?php

namespace App\Services\Restaurant\IndexRestaurant;

use App\DTO\Restaurant\Request\RequestIndexRestaurantDTO;

interface IndexRestaurantServiceInterface
{
    public function index(RequestIndexRestaurantDTO $restaurantDTO): array;
}
