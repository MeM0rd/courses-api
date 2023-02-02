<?php

namespace App\Subscription\Presenters;

use App\Framework\Models\Subscription;
use App\Subscription\ResourceModels\SaveSubscriptionResource;
use Ramsey\Collection\Collection;

class SubscriptionPresenter
{
    public function present(\Illuminate\Support\Collection | Subscription $subscriptions): array
    {
        $result = [];

        foreach ($subscriptions as $subscription) {
            $result[] = [
                'id' => $subscription->id,
                'user_id' => $subscription->user_id,
                'name' => $subscription->name,
                'cost' => $subscription->cost,
                'currency' => $subscription->currency,
                'note' => $subscription->note
            ];
        }


        return  $result;
    }
}
