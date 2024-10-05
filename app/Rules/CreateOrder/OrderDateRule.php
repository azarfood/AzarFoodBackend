<?php

namespace App\Rules\CreateOrder;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OrderDateRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value <= now()->addDays(1)->timestamp
            or
            $value >= now()->addDays(7)->timestamp) {
            $fail('The :attribute invalid.');
        }
    }
}
