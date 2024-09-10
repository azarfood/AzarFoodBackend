<?php
namespace App\Http\Controllers\User;

use App\DTO\User\Request\RequestShowUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ShowUserRequest;
use App\Models\User;
use App\Services\User\ShowUser\ShowUserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ShowUserController extends Controller
{
    public function __invoke(ShowUserRequest          $request,
                             ShowUserServiceInterface $showUserService): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $data = RequestShowUserDTO::fromRequest(
            user: $user,
        );

        $responseData = $showUserService->show($data);

        return Response::success($responseData);
    }
}
