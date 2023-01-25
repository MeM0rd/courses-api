<?php

namespace App\Auth\Actions;

use App\Auth\DTOs\LoginDTO;
use App\Auth\Exceptions\EmailValidationException;
use App\Auth\Exceptions\UnknownValidationException;
use App\Auth\Queries\AuthQueries;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Auth;

class LoginAction
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
     * @throws UnknownValidationException
     */
    public function execute(LoginDTO $dto): ?Authenticatable
    {
        $user = $this->authQueries->findUserByEmail($dto->email);

        if (!$user) {
            throw new EmailValidationException('Неверное имя или пароль!');
        }

        $validCredentials = $this->hasher->check($dto->password, $user->password);

        if (!$validCredentials) {
            throw new EmailValidationException('Неверный пароль');
        }

        $attempt = Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password
        ]);

        if (!$attempt) {
            throw new UnknownValidationException('Что-то пошло не так');
        };

        return $this->authManager->guard()->user();
    }
}
