<?php

namespace App\Subscription\Queries;

use App\Framework\Models\Subscription;
use Illuminate\Support\Collection;

class SubscriptionQueries
{
    public function findSubscriptionsByUserId(int $userId): ?Collection
    {
        return Subscription::whereUserId($userId)
            ->orderByDesc('id')
            ->get();
    }

    public function findSubscriptionById(int $userId, int $id): ?Subscription
    {
        return Subscription::where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }

    public function searchSubscriptions(string $search, int $userId): Collection
    {
        return Subscription::whereUserId($userId)
            ->where('name', 'ilike', "%$search%")
            ->orWhere('note', 'ilike', "%$search%")
            ->orWhere('cost', 'ilike', "%$search%")
            ->get();
    }
}
