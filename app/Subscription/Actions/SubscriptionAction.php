<?php

namespace App\Subscription\Actions;

use App\Framework\Models\Subscription;
use App\Subscription\DTOs\SubscriptionDTO;
use App\Subscription\Queries\SubscriptionQueries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class SubscriptionAction
{
    protected SubscriptionQueries $subscriptionQueries;

    public function __construct(SubscriptionQueries $subscriptionQueries)
    {
        $this->subscriptionQueries = $subscriptionQueries;
    }

    public function execute(SubscriptionDTO $dto): ?Collection
    {
        return $this->subscriptionQueries->findSubscriptionsByUserId($dto->userId);
    }
}
