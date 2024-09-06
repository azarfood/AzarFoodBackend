<?php

namespace App\Enums;

enum RestaurantStatus
{
    const Active = 'active';
    const Inactive = 'inactive';
    const TYPES = [self::Active, self::Inactive];
}
