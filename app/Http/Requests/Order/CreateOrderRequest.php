<?php

namespace App\Http\Requests\Order;

use App\Rules\OrderCartRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $carts
 */
class CreateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'carts' => ['required', 'array', new OrderCartRule()],
        ];
    }
}
