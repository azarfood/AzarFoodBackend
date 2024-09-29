<?php

namespace App\Services\Food\IndexAllFoods;

use App\DTO\Food\FoodDTO;
use App\DTO\Food\Request\RequestIndexAllFoodsDTO;
use App\Models\Food;

class IndexAllFoodsServiceConcrete implements IndexAllFoodsServiceInterface
{
    public function index(RequestIndexAllFoodsDTO $allFoodsDTO): array
    {
        $per_page = $allFoodsDTO->per_page ?: 10;
        $page = $allFoodsDTO->page ?: 1;

        $allFood = Food::query();
        if ($allFoodsDTO->q) {
            $allFood = $allFood->like($allFoodsDTO->q);
        }
        if ($allFoodsDTO->category) {
            $allFood = $allFood->hasFoodInCategory($allFoodsDTO->category);
        }
        if ($allFoodsDTO->collection) {
            $allFood = $allFood->filterByCollection($allFoodsDTO->collection);
        }
        $pagination = $allFood
            ->paginate($per_page, ['*'], 'page', $page);
        $foods = $pagination->map(fn(Food $food) => FoodDTO::fromModel(
            food: $food
        ));
        return $foods->toArray();
    }
}
