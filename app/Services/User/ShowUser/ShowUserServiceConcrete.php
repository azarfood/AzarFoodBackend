<?php

namespace App\Services\User\ShowUser;

use App\DTO\User\Request\RequestShowUserDTO;
use App\DTO\User\UserDTO;

class ShowUserServiceConcrete implements ShowUserServiceInterface
{
    public function show(RequestShowUserDTO $userDTO): UserDTO
    {
        return UserDTO::fromModel($userDTO->user);
    }
}
