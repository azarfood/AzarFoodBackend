<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(LoginRequest $request): JsonResponse
    {
        $user = User::query()
            ->where('student_code', $request->username)
            ->first();

        if (
            !$user ||
            !Hash::check(
                $request->password,
                $user->password
            )
        ) {
            throw ValidationException::withMessages([
                'username' => [
                    'The provided credentials are incorrect.'
                ],
            ]);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json([
            'auth_token' => $token
        ]);
    }
}
