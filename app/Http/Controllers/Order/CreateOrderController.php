<?php

namespace App\Http\Controllers\Order;

use App\DTO\Order\CreateOrderProductsDTO;
use App\DTO\Order\OrderCartDTO;
use App\DTO\Order\Request\RequestCreateOrderDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Services\Order\CreateOrder\CreateOrderServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateOrderController extends Controller
{
    public function __invoke(CreateOrderRequest          $request,
                             CreateOrderServiceInterface $createOrderService): JsonResponse
    {
        $carts = [];
        foreach ($request->carts as $cartData) {
            $orderProducts = [];
            foreach ($cartData['orderProducts'] as $productData) {
                $orderProducts[] = new CreateOrderProductsDTO(
                    $productData['id'],
                    $productData['count']
                );
            }

            $carts[] = new OrderCartDTO(
                $cartData['order_date'],
                $cartData['time'], $cartData['place'],
                $orderProducts
            );
        }

        $data = RequestCreateOrderDTO::fromRequest(
            carts: $carts,
        );

        $responseData = $createOrderService->create($data);

        return Response::success($responseData);
    }
}
