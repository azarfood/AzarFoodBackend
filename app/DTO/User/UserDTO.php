<?php

namespace App\DTO\User;

use App\Models\User;
use RuntimeException;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserDTO
{
    public function __construct(
        public string $student_code,
        public string $national_code,
        public string $type,
        public string $first_name,
        public string $last_name,
        public string $avatar,
    )
    {
    }

    public static function fromModel(User $user): UserDTO
    {
        try {
            return new self(
                student_code: $user->student_code,
                national_code: $user->national_code,
                type: $user->type,
                first_name: $user->first_name,
                last_name: $user->last_name,
                avatar: $user->avatar_id
            );
        } catch (UnknownProperties $e) {
            throw  new RuntimeException($e->getMessage());
        }
    }
}

