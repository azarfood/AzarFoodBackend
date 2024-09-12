<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderHistory\OrderHistoryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderHistoryController extends Controller
{
    public function __invoke(Request                      $request,
                             OrderHistoryServiceInterface $orderHistoryService): JsonResponse
    {
        $responseData = $orderHistoryService->index();

        return Response::success($responseData);
    }
}
