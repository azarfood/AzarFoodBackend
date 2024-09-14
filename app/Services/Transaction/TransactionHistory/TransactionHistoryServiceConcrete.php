<?php

namespace App\Services\Transaction\TransactionHistory;

use App\DTO\Transaction\Request\RequestTransactionHistoryDTO;
use App\DTO\Transaction\TransactionDTO;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionHistoryServiceConcrete implements TransactionHistoryServiceInterface
{
    public function index(RequestTransactionHistoryDTO $transactionHistoryDTO): array
    {
        $per_page = $transactionHistoryDTO->per_page ?: 10;
        $page = $transactionHistoryDTO->page ?: 1;
        $dateFrom = $transactionHistoryDTO->dateFrom ?: 1;
        $dateTo = $transactionHistoryDTO->dateTo ?: Carbon::now()->timestamp;
        /** @var User $user */
        $user = Auth::user();
        $pagination = $user->transactions()
            ->whereBetween('date', [$dateFrom, $dateTo])
            ->paginate($per_page, ['*'], 'page', $page);
        $transactions = $pagination->map(fn(Transaction $transaction) => TransactionDTO::fromModel(
            transaction: $transaction
        ));

        return $transactions->toArray();
    }
}
