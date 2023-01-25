<?php

namespace App\Subscription\Controllers;

use App\Common\Traits\JsonResponsible;
use App\Framework\Http\Controllers\Controller;
use App\Subscription\Actions\SaveSubscriptionAction;
use App\Subscription\Actions\SubscriptionAction;
use App\Subscription\Factories\SubscriptionFactory;
use App\Subscription\Presenters\SubscriptionPresenter;
use App\Subscription\Requests\SubscriptionRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscriptionController extends Controller
{
    use JsonResponsible;

    protected SubscriptionPresenter $subscriptionPresenter;

    public function __construct(SubscriptionPresenter $subscriptionPresenter)
    {
        $this->subscriptionPresenter = $subscriptionPresenter;
    }

    public function index(SubscriptionRequest $request, SubscriptionAction $action): JsonResponse
    {
        $dto = SubscriptionFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $this->subscriptionPresenter->present($action);

        return $this->success($result);
    }

    public function save(SubscriptionRequest $request, SaveSubscriptionAction $action)
    {
        $dto = SubscriptionFactory::fromRequest($request);

        $action = $action->execute($dto);

        return $action;
    }
}
