<?php

namespace App\Subscription\Presenters;

use App\Subscription\Queries\SubscriptionQueries;
use Illuminate\Database\Eloquent\Collection;

class SearchSubscriptionPresenter extends SubscriptionPresenter
{
    protected SubscriptionQueries $subscriptionQueries;

    public function __construct(SubscriptionQueries $subscriptionQueries)
    {
        $this->subscriptionQueries = $subscriptionQueries;
    }

    public function search(string|null $text, int $userId): array
    {
        if (!$text) {
            $subscriptions = $this->subscriptionQueries->findSubscriptionsByUserId($userId);

            return $this->present($subscriptions);
        }

        $searchedSubscriptions = $this->subscriptionQueries->searchSubscriptions($text, $userId);

        return $this->present($searchedSubscriptions);
    }
}
