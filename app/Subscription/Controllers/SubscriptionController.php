<?php

namespace App\Subscription\Controllers;

use App\Common\Traits\JsonResponsible;
use App\Framework\Http\Controllers\Controller;
use App\Subscription\Actions\SaveSubscriptionAction;
use App\Subscription\Actions\SubscriptionAction;
use App\Subscription\Factories\SubscriptionFactory;
use App\Subscription\Presenters\SaveSubscriptionPresenter;
use App\Subscription\Presenters\SearchSubscriptionPresenter;
use App\Subscription\Presenters\SubscriptionPresenter;
use App\Subscription\Requests\SearchSubscriptionRequest;
use App\Subscription\Requests\SubscriptionRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscriptionController extends Controller
{
    use JsonResponsible;

    protected SubscriptionPresenter $subscriptionPresenter;
    protected SaveSubscriptionPresenter $saveSubscriptionPresenter;

    public function __construct(
        SubscriptionPresenter $subscriptionPresenter,
        SaveSubscriptionPresenter $saveSubscriptionPresenter,
        SearchSubscriptionPresenter $searchSubscriptionPresenter
    ) {
        $this->subscriptionPresenter = $subscriptionPresenter;
        $this->saveSubscriptionPresenter = $saveSubscriptionPresenter;
        $this->searchSubscriptionPresenter = $searchSubscriptionPresenter;
    }

    public function index(SubscriptionRequest $request, SubscriptionAction $action): JsonResponse
    {
        $userId = $request->get('user_id');

        $action = $action->execute($userId);

        $result = $this->subscriptionPresenter->present($action);

        return $this->success($result);
    }

    public function save(SubscriptionRequest $request, SaveSubscriptionAction $action): JsonResponse
    {
        $dto = SubscriptionFactory::fromRequest($request);

        $action = $action->execute($dto);

        $result = $this->saveSubscriptionPresenter->present($action);

        return $this->success($result);
    }

    public function search(SearchSubscriptionRequest $request): JsonResponse
    {
        $text = $request->get('text');
        $userId = $request->get('user_id');

        $result = $this->searchSubscriptionPresenter->search($text, $userId);

        return $this->success($result);
    }
}
