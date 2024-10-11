<?php

namespace App\Enums;

enum FoodCategory
{
    const PIZZA = 'pizza';
    const BURGER = 'burger';
    const IRANIAN = 'iranian';
    const FRIED_FOOD = 'fried_food';
    const SANDWICH = 'sandwich';
    const SALAD = 'salad';
    const PRODUCT = 'product';
    const CATEGORIES = [
        self::PIZZA,
        self::BURGER,
        self::IRANIAN,
        self::FRIED_FOOD,
        self::SALAD,
        self::SANDWICH,
        self::PRODUCT
    ];
}
