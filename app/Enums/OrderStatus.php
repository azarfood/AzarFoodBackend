<?php

namespace App\Enums;

enum OrderStatus
{
    const DELIVERED = 'delivered';
    const PENDING = 'pending';
    const STATUSES = [self::DELIVERED, self::PENDING];
}
