<?php

namespace App\Auth\Presenters;

use App\Auth\ResourceModels\AuthUserResource;
use App\Framework\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthUserPresenter
{
    public function __construct()
    {
    }

    public function present(User|Authenticatable|null $user): ?AuthUserResource
    {
        if (!$user) {
            return null;
        }

        $resource = new AuthUserResource();

        $resource->id = $user->id;
        $resource->email = $user->email;
        $resource->name = $user->name;
        $resource->phone = $user->phone;

        return $resource;
    }
}
