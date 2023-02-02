<?php

namespace App\Subscription\Queries;

use App\Framework\Models\Subscription;
use App\Subscription\DTOs\SubscriptionDTO;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class SubscriptionQueries
{
    public function findSubscriptionsByUserId(int $userId): ?Collection
    {
        return Subscription::whereUserId($userId)
            ->orderByDesc('id')
            ->get();
    }

    public function findSubscriptionById(SubscriptionDTO $dto): ?Subscription
    {
        return Subscription::where('id', $dto->id)
            ->where('user_id', $dto->userId)
            ->first();
    }

    public function searchSubscriptions(string $search, int $userId)
    {
        return Subscription::whereUserId($userId)
            ->where('name', 'ilike', "%$search%")
            ->orWhere('note', 'ilike', "%$search%")
            ->orWhere('cost', 'ilike', "%$search%")
            ->get();
    }
}
