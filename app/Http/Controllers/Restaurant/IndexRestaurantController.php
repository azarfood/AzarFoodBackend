<?php

namespace App\Http\Controllers\Restaurant;

use App\DTO\Restaurant\Request\RequestIndexRestaurantDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\IndexRestaurantRequest;
use App\Services\Restaurant\IndexRestaurant\IndexRestaurantServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class IndexRestaurantController extends Controller
{
    public function __invoke(IndexRestaurantRequest          $request,
                             IndexRestaurantServiceInterface $indexRestaurantService): JsonResponse
    {
        $data = RequestIndexRestaurantDTO::fromRequest(
            q: $request->q,
            category: $request->category,
            collection: $request->collection,
            per_page: $request->per_page,
            page: $request->page
        );

        $responseData = $indexRestaurantService->index($data);

        return Response::success($responseData);
    }
}
