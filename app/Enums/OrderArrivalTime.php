<?php

namespace App\Enums;

enum OrderArrivalTime
{
    const ONE = '1100-1145';
    const TWO = '1145-1230';
    const THREE = '1230-1315';
    const FOUR = '1315-1400';
    const FIVE = '1900-1945';
    const SIX = '1945-2030';
    const SEVEN = '2030-2130';
    const FOR_LUNCH = [self::ONE, self::TWO, self::THREE, self::FOUR];
    const FOR_DINNER = [self::FIVE, self::SIX, self::SEVEN];
    const TIMES = [self::ONE, self::TWO, self::THREE, self::FOUR, self::FIVE, self::SIX, self::SEVEN];
}
