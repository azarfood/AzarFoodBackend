<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderListRequest;
use App\Services\Order\OrderList\OrderListServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class OrderListController extends Controller
{
    public function __invoke(OrderListRequest          $request,
                             OrderListServiceInterface $orderListService): JsonResponse
    {
        $responseData = $orderListService->index();

        return Response::success($responseData);
    }
}
