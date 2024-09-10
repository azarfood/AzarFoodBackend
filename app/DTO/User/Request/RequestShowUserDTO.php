<?php

namespace App\DTO\User\Request;

use App\Models\User;

readonly class RequestShowUserDTO
{
    public function __construct(
        public User $user,
    )
    {
    }

    public static function fromRequest(
        User $user
    ): self
    {
        return new self(
            user: $user
        );
    }
}
