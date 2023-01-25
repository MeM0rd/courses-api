<?php

namespace App\Auth\Factories;

use App\Auth\DTOs\LoginDTO;
use App\Auth\Requests\LoginRequest;

class LoginFactory
{
    public static function fromRequest(LoginRequest $request): LoginDTO
    {
        $dto = new LoginDTO();

        $dto->email = $request->get('email');
        $dto->password = $request->get('password');

        return $dto;
    }
}
