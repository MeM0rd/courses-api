<?php

namespace App\Auth\Queries;

use App\Framework\Models\User;

class AuthQueries
{
    public function findUserByEmail(string $email): ?User
    {
        return User::whereEmail($email)->first();
    }

    public function existByEmail(string $email): bool
    {
        return User::where('email', 'ilike', $email)->exists();
    }
}
