<?php

namespace App\Services\Restaurant\IndexRestaurant;

use App\DTO\Restaurant\Request\RequestIndexRestaurantDTO;
use App\DTO\Restaurant\RestaurantDTO;
use App\Models\Restaurant;

class IndexRestaurantServiceConcrete implements IndexRestaurantServiceInterface
{
    public function index(RequestIndexRestaurantDTO $restaurantDTO): array
    {
        $per_page = $restaurantDTO->per_page ?: 10;
        $page = $restaurantDTO->page ?: 1;

        $allRestaurant = Restaurant::query();
        if ($restaurantDTO->q) {
            $allRestaurant = $allRestaurant->like($restaurantDTO->q);
        }
        if ($restaurantDTO->category) {
            $allRestaurant = $allRestaurant->hasFoodInCategory($restaurantDTO->category);
        }
        if ($restaurantDTO->collection) {
            $allRestaurant = $allRestaurant->filterByCollection($restaurantDTO->collection);
        }
        $pagination = $allRestaurant
            ->paginate($per_page, ['*'], 'page', $page);
        $restaurants = $pagination->map(fn(Restaurant $restaurant) => RestaurantDTO::fromModel(
            restaurant: $restaurant
        ));
        return $restaurants->toArray();
    }
}
