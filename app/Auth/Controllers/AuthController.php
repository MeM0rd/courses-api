<?php

namespace App\Auth\Controllers;

use App\Auth\Actions\LoginAction;
use App\Auth\Actions\RegisterAction;
use App\Auth\Factories\LoginFactory;
use App\Auth\Factories\RegisterFactory;
use App\Auth\Presenters\AuthUserPresenter;
use App\Auth\Requests\LoginRequest;
use App\Auth\Requests\RegisterRequest;
use App\Common\Traits\JsonResponsible;
use App\Framework\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use JsonResponsible;

    protected AuthUserPresenter $authUserPresenter;

    public function __construct(AuthUserPresenter $authUserPresenter)
    {
        $this->authUserPresenter = $authUserPresenter;
    }

    public function loginByEmail(LoginRequest $request, LoginAction $action): JsonResponse
    {
        $dto = LoginFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $this->authUserPresenter->present($action);

        return $this->success($result);
    }

    public function registerByEmail(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        $dto = RegisterFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $this->authUserPresenter->present($action);

        return $this->success($result);
    }
}
