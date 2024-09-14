<?php

namespace App\Services\Transaction\TransactionHistory;

use App\DTO\Transaction\Request\RequestTransactionHistoryDTO;

interface TransactionHistoryServiceInterface
{
    public function index(RequestTransactionHistoryDTO $transactionHistoryDTO): array;
}
