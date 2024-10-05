<?php

namespace App\Rules;

use App\Enums\OrderArrivalTime;
use App\Enums\Place;
use App\Rules\CreateOrder\OrderDateRule;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OrderCartRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = Validator::make(['carts' => $value], [
            'carts' => 'required|array',
            'carts.*.order_date' => ['required', 'integer', new OrderDateRule()],
            'carts.*.time' => ['required', Rule::in(OrderArrivalTime::TIMES)],
            'carts.*.place' => ['required', Rule::in(Place::PLACES)],
            'carts.*.orderProducts' => 'required|array',
            'carts.*.orderProducts.*.id' => 'required|integer|exists:foods,id',
            'carts.*.orderProducts.*.count' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            $fail($validator->errors()->keys()[0]);
        }
    }
}
