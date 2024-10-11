<?php

namespace App\Enums;

enum FoodCollection
{
    const Best = 'best';
    const Discount = 'discounted';
    const Popular = 'most_popular';
    const Selling = 'most_selling';
    const Collections = [self::Best, self::Discount, self::Popular, self::Selling];
}
