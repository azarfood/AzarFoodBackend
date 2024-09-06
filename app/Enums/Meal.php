<?php

namespace App\Enums;

enum Meal
{
    const LUNCH = 'lunch';
    const DINNER = 'dinner';
    const MEALS = [self::LUNCH, self::DINNER];
}
