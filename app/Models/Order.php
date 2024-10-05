<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $order_products
 * @property mixed $id
 * @property mixed $date
 * @property mixed $totalCost
 * @property mixed $status
 * @property mixed $meal
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'meal',
        'date',
        'total_cost',
        'place',
        'time',
    ];

    //region Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProducts::class, "order_id");
    }
    //endregion

    //region scopes
    public function scopeByStatus(Builder $query, $status): void
    {
        $query->where('status', '=', $status);
    }

    //endregion

    //region attribute
    public function getTotalCostAttribute(): string
    {
        return $this->order_products()
            ->join('foods', 'order_products.product_id', '=', 'foods.id')
            ->sum('cost');

    }
    //endregion
}
