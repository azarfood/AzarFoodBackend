<?php

namespace App\Enums;

Enum TransactionType
{
    const POSITIVE = 'positive';
    const NEGATIVE = 'negative';
    const TYPES = [self::POSITIVE, self::NEGATIVE];
}
