<?php

namespace App\Subscription\DTOs;

class SubscriptionDTO
{
    public int|null $id;

    public int $userId;

    public string $name;

    public float $cost;

    public string $currency;

    public string|null $note;
}
