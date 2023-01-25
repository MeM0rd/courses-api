<?php

namespace App\Auth\ResourceModels;

class AuthUserResource
{
    public int $id = 0;

    public ?string $email = null;

    public ?string $name = null;

    public ?int $phone = null;
}
