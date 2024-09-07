<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $username
 * @property mixed $password
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "username" => "required|string|exists:users,student_code|min:8|max:20",
            "password" => "required|string|min:8|max:20",
        ];
    }
}
