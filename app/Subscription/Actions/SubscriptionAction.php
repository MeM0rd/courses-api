<?php

namespace App\Subscription\Actions;

use App\Subscription\Queries\SubscriptionQueries;
use Illuminate\Support\Collection;

class SubscriptionAction
{
    protected SubscriptionQueries $subscriptionQueries;

    public function __construct(SubscriptionQueries $subscriptionQueries)
    {
        $this->subscriptionQueries = $subscriptionQueries;
    }

    public function execute(int $userId): ?Collection
    {
        return $this->subscriptionQueries->findSubscriptionsByUserId($userId);
    }
}
