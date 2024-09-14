<?php

namespace App\DTO\Transaction;

use App\Models\Transaction;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class TransactionDTO
{
    public function __construct(
        public string $id,
        public string $type,
        public string $date,
        public string $amount
    )
    {
    }

    public static function fromModel(Transaction $transaction): TransactionDTO
    {
        try {
            return new self(
                id: $transaction->id,
                type: $transaction->type,
                date: $transaction->date,
                amount: $transaction->amount
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

