<?php

namespace App\Http\Controllers\Food;

use App\DTO\Food\Request\RequestIndexFoodDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Food\IndexFoodRequest;
use App\Models\Restaurant;
use App\Services\Food\IndexFood\IndexFoodServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class IndexFoodController extends Controller
{
    public function __invoke(IndexFoodRequest          $request,
                             Restaurant                $restaurant,
                             IndexFoodServiceInterface $indexFoodService): JsonResponse
    {
        $data = RequestIndexFoodDTO::fromRequest(
            restaurant: $restaurant,
            q: $request->q,
            category: $request->category,
            collection: $request->collection,
            per_page: $request->per_page,
            page: $request->page
        );

        $responseData = $indexFoodService->index($data);

        return Response::success($responseData);
    }
}
