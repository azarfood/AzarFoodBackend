<?php

namespace App\Enums;

enum OrderStatus
{
    const RESERVED = 'reserved';
    const CANCELED = 'canceled';
    const DELIVERED = 'delivered';
    const STATUSES = [self::RESERVED, self::CANCELED, self::DELIVERED];
}
