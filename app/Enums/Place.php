<?php

namespace App\Enums;

enum Place
{
    const ADABIYAT = '1';
    const ULUMPAYE = '2';
    const ALMAHDI = '3';
    const ALZAHRA = '4';

    const PLACES = [self::ADABIYAT, self::ULUMPAYE, self::ALMAHDI, self::ALZAHRA];
}
