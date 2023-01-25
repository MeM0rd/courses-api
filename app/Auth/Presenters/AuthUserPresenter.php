<?php

namespace App\Auth\Presenters;

use App\Auth\ResourceModels\AuthUserResource;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Framework\Models\User;

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
