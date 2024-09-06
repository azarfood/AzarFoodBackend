<?php

namespace App\Enums;

enum UserType
{
    const STUDENT_TYPE = 'student';
    const PROFESSOR_TYPE = 'professor';
    const TYPES = [self::STUDENT_TYPE, self::PROFESSOR_TYPE];
}

