<?php

namespace App\Services\Food\IndexFood;

use App\DTO\Food\FoodDTO;
use App\DTO\Food\Request\RequestIndexFoodDTO;
use App\Models\Food;

class IndexFoodServiceConcrete implements IndexFoodServiceInterface
{
    public function index(RequestIndexFoodDTO $foodDTO): array
    {
        $per_page = $foodDTO->per_page ?: 10;
        $page = $foodDTO->page ?: 1;

        $restaurantFoods = $foodDTO->restaurant->foods();
        if ($foodDTO->q) {
            $restaurantFoods = $restaurantFoods->like($foodDTO->q);
        }
        if ($foodDTO->category) {
            $restaurantFoods = $restaurantFoods->hasFoodInCategory($foodDTO->category);
        }
        if ($foodDTO->collection) {
            $restaurantFoods = $restaurantFoods->filterByCollection($foodDTO->collection);
        }
        $pagination = $restaurantFoods
            ->paginate($per_page, ['*'], 'page', $page);
        $foods = $pagination->map(fn(Food $food) => FoodDTO::fromModel(
            food: $food
        ));
        return $foods->toArray();
    }
}
