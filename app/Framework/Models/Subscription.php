<?php

namespace App\Framework\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Framework\Models\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property float $cost
 * @property string $currency
 * @property string $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Subscription newModelQuery()
 * @method static Builder|Subscription newQuery()
 * @method static Builder|Subscription query()
 * @method static Builder|Subscription whereCost($value)
 * @method static Builder|Subscription whereCreatedAt($value)
 * @method static Builder|Subscription whereCurrency($value)
 * @method static Builder|Subscription whereId($value)
 * @method static Builder|Subscription whereName($value)
 * @method static Builder|Subscription whereNote($value)
 * @method static Builder|Subscription whereUpdatedAt($value)
 * @method static Builder|Subscription whereUserId($value)
 * @mixin Eloquent
 */
class Subscription extends Model
{
    use HasFactory;
}
