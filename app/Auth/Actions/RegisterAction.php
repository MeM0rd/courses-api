<?php

namespace App\Auth\Actions;

use App\Auth\DTOs\RegisterDTO;
use App\Auth\Exceptions\EmailValidationException;
use App\Auth\Queries\AuthQueries;
use App\Framework\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Hashing\Hasher;

class RegisterAction
{
    protected AuthManager $authManager;

    protected Hasher $hasher;

    protected AuthQueries $authQueries;

    public function __construct(AuthManager $authManager, Hasher $hasher, AuthQueries $authQueries)
    {
        $this->authManager = $authManager;
        $this->hasher = $hasher;
        $this->authQueries = $authQueries;
    }

    /**
     * @throws EmailValidationException
     */
    public function execute(RegisterDTO $dto): User
    {
        if ($this->authQueries->existByEmail($dto->email)) {
            throw new EmailValidationException('Пользователь с таким Email уже существует', 422);
        }

        return $this->registerUser($dto);
    }

    private function registerUser(RegisterDTO $dto): User
    {
        $user = new User;

        $user->email = $dto->email;
        $user->password = $this->hasher->make($dto->password);
        $user->name = $dto->name;
        $user->phone = $dto->phone;

        $user->save();

        return $user;
    }

}
