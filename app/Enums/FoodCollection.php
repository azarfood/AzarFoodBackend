<?php

namespace App\Enums;

enum FoodCollection
{
    const Best = 'best';
    const Discount = 'discount';
    const Collections = [self::Best, self::Discount];
}
