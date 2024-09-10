<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        $token = $user->createToken('token')->plainTextToken;
        return Response::success([
            'token' => $token
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = Auth::guard()->user();

        $user->tokens()->delete();

        return Response::success([
            'massage' => "logout",
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function password(ChangePasswordRequest $request): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        if (
            !Hash::check(
                $request->old_password,
                $user->password
            )
        ) {
            throw ValidationException::withMessages([
                'old_password' => [
                    'password is incorrect.'
                ],
            ]);
        }

        $user->password = $request->new_password;
        $user->save();
        return Response::success(
            null,
            'password changed successfully'
        );
    }
}
