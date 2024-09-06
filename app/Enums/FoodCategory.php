<?php

namespace App\Enums;

enum FoodCategory
{
    const FASTFOOD = 'fastfood';
    const SONNATI = 'sonnati';
    const CATEGORIES = [self::FASTFOOD, self::SONNATI];
}
