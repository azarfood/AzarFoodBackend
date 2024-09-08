<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $old_password
 * @property mixed $new_password
 */
class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|max:20',
        ];
    }
}
