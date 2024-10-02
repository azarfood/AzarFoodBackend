<?php

namespace App\Http\Controllers\Food;

use App\DTO\Food\Request\RequestShowFoodDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Food\ShowFoodRequest;
use App\Models\Food;
use App\Services\Food\ShowFood\ShowFoodServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ShowFoodController extends Controller
{
    public function __invoke(ShowFoodRequest          $request,
                             Food                     $food,
                             ShowFoodServiceInterface $showFoodService): JsonResponse
    {
        $data = RequestShowFoodDTO::fromRequest(
            food: $food,
        );

        $responseData = $showFoodService->show($data);

        return Response::success($responseData);
    }
}
