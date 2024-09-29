<?php

namespace App\Http\Requests\Food;

use App\Enums\FoodCategory;
use App\Enums\FoodCollection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed $q
 * @property mixed $category
 * @property mixed $collection
 * @property mixed $per_page
 * @property mixed $page
 */
class IndexAllFoodsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => 'nullable|string|max:60|min:2',
            'category' => ['nullable', Rule::in(FoodCategory::CATEGORIES)],
            'collection' => ['nullable', Rule::in(FoodCollection::Collections)],
            'per_page' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
        ];
    }
}
