<?php

namespace App\Auth\Factories;

use App\Auth\DTOs\RegisterDTO;
use App\Auth\Requests\RegisterRequest;

class RegisterFactory
{
    public static function fromRequest(RegisterRequest $request): RegisterDTO
    {
        $dto = new RegisterDTO();

        $dto->email = $request->get('email');
        $dto->password = $request->get('password');
        $dto->name = $request->get('name');
        $dto->phone = $request->get('phone');

        return $dto;
    }
}
