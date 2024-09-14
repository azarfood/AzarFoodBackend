<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $per_page
 * @property mixed $page
 * @property mixed $dateFrom
 * @property mixed $dateTo
 */
class TransactionHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
            'dateFrom' => 'nullable|integer',
            'dateTo' => 'nullable|integer'
        ];
    }
}
