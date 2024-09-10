<?php

namespace App\Services\User\ShowUser;

use App\DTO\User\Request\RequestShowUserDTO;
use App\DTO\User\UserDTO;

interface ShowUserServiceInterface
{
    public function show(RequestShowUserDTO $userDTO): UserDTO;
}
