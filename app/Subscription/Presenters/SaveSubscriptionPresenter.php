<?php

namespace App\Subscription\Presenters;

use App\Framework\Models\Subscription;
use App\Subscription\ResourceModels\SaveSubscriptionResource;

class SaveSubscriptionPresenter
{
    public function present(Subscription $subscription): SaveSubscriptionResource
    {
        $resource = new SaveSubscriptionResource();

        $resource->id = $subscription->id;
        $resource->user_id = $subscription->user_id;
        $resource->name = $subscription->name;
        $resource->cost = $subscription->cost;
        $resource->currency = $subscription->currency;
        $resource->note = $subscription->note;

        return $resource;
    }
}
