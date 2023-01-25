<?php

namespace App\Subscription\ResourceModels;

class SubscriptionResource
{
    public int $id;

    public int $user_id;

    public string $name;

    public int $cost;

    public string $currency;

    public string $note;
}
