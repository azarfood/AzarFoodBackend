<?php

namespace App\Http\Controllers\Transaction;

use App\DTO\Transaction\Request\RequestTransactionHistoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\TransactionHistoryRequest;
use App\Services\Transaction\TransactionHistory\TransactionHistoryServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TransactionHistoryController extends Controller
{
    public function __invoke(TransactionHistoryRequest          $request,
                             TransactionHistoryServiceInterface $indexTransactionService): JsonResponse
    {
        $data = RequestTransactionHistoryDTO::fromRequest(
            per_page: $request->per_page,
            page: $request->page,
            dateFrom: $request->dateFrom,
            dateTo: $request->dateTo
        );

        $responseData = $indexTransactionService->index($data);

        return Response::success($responseData);
    }
}
