<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class ShowFoodRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
