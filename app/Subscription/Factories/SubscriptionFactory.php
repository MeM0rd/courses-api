<?php

namespace App\Subscription\Factories;

use App\Subscription\DTOs\SubscriptionDTO;
use App\Subscription\Requests\SubscriptionRequest;

class SubscriptionFactory
{
    public static function fromRequest(SubscriptionRequest $request): SubscriptionDTO
    {
        $dto = new SubscriptionDTO();

        $dto->userId   = $request->get('user_id');

        $dto->id       = $request->get('id') ? $request->get('id') : null;
        $dto->name     = $request->get('name');
        $dto->cost     = $request->get('cost');
        $dto->currency = $request->get('currency');
        $dto->note     = $request->get('note') ? $request->get('note') : '';

        return $dto;
    }
}
