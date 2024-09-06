<?php

namespace App\Enums;

class TransactionType
{
    const POSITIVE = 'positive';
    const NEGATIVE = 'negative';
    const TYPES = [self::POSITIVE, self::NEGATIVE];
}
