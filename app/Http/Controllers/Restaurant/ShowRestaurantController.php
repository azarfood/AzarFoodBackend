<?php

namespace App\Http\Controllers\Restaurant;

use App\DTO\Restaurant\Request\RequestShowRestaurantDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\ShowRestaurantRequest;
use App\Models\Restaurant;
use App\Services\Restaurant\ShowRestaurant\ShowRestaurantServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ShowRestaurantController extends Controller
{
    public function __invoke(ShowRestaurantRequest          $request,
                             Restaurant                     $restaurant,
                             ShowRestaurantServiceInterface $showRestaurantService): JsonResponse
    {
        $data = RequestShowRestaurantDTO::fromRequest(
            restaurant: $restaurant,
        );

        $responseData = $showRestaurantService->show($data);

        return Response::success($responseData);
    }
}
