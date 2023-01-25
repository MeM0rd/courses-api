<?php

namespace App\Subscription\Actions;

use App\Framework\Models\Subscription;
use App\Subscription\DTOs\SubscriptionDTO;
use App\Subscription\Queries\SubscriptionQueries;

class SaveSubscriptionAction
{
    protected SubscriptionQueries $subscriptionQueries;

    public function __construct(SubscriptionQueries $subscriptionQueries)
    {
        $this->subscriptionQueries = $subscriptionQueries;
    }

    public function execute(SubscriptionDTO $dto): Subscription
    {
        if ($dto->id && $dto->userId) {
            $model = $this->subscriptionQueries->findSubscriptionById($dto);

            $model = $this->collectModel($model, $dto);

            $model->update();

            return $model;
        }

        $model = new Subscription();

        $model = $this->collectModel($model, $dto);

        $model->save();

        return $model;
    }

    private function collectModel(?Subscription $model, SubscriptionDTO $dto): Subscription
    {
        $model->user_id  = $dto->userId;
        $model->name     = $dto->name;
        $model->cost     = $dto->cost;
        $model->currency = $dto->currency;
        $model->note     = $dto->note;

        return $model;
    }
}
