<?php

namespace App\Http\Controllers\Food;

use App\DTO\Food\Request\RequestIndexAllFoodsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Food\IndexAllFoodsRequest;
use App\Services\Food\IndexAllFoods\IndexAllFoodsServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class IndexAllFoodsController extends Controller
{
    public function __invoke(IndexAllFoodsRequest          $request,
                             IndexAllFoodsServiceInterface $indexAllFoodsService): JsonResponse
    {
        $data = RequestIndexAllFoodsDTO::fromRequest(
            q: $request->q,
            category: $request->category,
            collection: $request->collection,
            per_page: $request->per_page,
            page: $request->page
        );

        $responseData = $indexAllFoodsService->index($data);

        return Response::success($responseData);
    }
}
