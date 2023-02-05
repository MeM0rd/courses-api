<?php

namespace App\Subscription\Presenters;

use App\Subscription\Queries\SubscriptionQueries;

class DeleteSubscriptionAction
{
    protected SubscriptionQueries $subscriptionQueries;

    public function __construct(SubscriptionQueries $subscriptionQueries)
    {
        $this->subscriptionQueries = $subscriptionQueries;
    }

    public function execute(int $userId, int $id)
    {
        $subscription = $this->subscriptionQueries->findSubscriptionById($userId, $id);

        $subscription->delete();

        return $this->subscriptionQueries->findSubscriptionsByUserId($userId);
    }
}
