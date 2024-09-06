<?php

namespace App\Enums;

enum FoodType
{
    const FOOD = 'food';
    const PRODUCT = 'product';
    const TYPES = [self::FOOD, self::PRODUCT];
}
