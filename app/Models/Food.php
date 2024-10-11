<?php

namespace App\Models;

use App\Enums\FoodCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $id
 * @property mixed $template
 * @property mixed $rating
 * @property mixed $restaurant
 * @property mixed $cost
 */
class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $fillable = [];

    //region Relations
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(FoodTemplate::class, 'template_id');
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProducts::class, 'product_id');
    }
    //endregion

    //region Scopes
    public function scopeLike(Builder $query, $q): void
    {
        $query->whereHas('template', function (Builder $food) use ($q) {
            $food->whereLike('name', $q);
        });
    }

    public function scopeHasFoodInCategory(Builder $query, $category): void
    {
        $query->whereHas('template', function (Builder $food) use ($category) {
            $food->where('category', $category);
        });
    }

    public function scopeFilterByCollection(Builder $query, $collection): void
    {
        if ($collection == FoodCollection::Best) {
            $q = DB::table('foods')
                ->select('foods.id')
                ->join('order_products', 'foods.id',
                    '=', 'order_products.product_id')
                ->join('orders', 'order_products.order_id',
                    '=', 'orders.id')
                ->groupBy('foods.id')
                ->havingRaw('AVG(orders.rating) >= ?', [2])
                ->get();
            /** @var Collection $q */
            $q = $q->map(function ($item) {
                return $item->id;
            });
            $query->whereIn('id', $q);
        } elseif ($collection == FoodCollection::Discount) {
            $query->where('id', '1');
        }
    }
    //endregion

    //region attribute
    public function getRatingAttribute(): string
    {
        $averageRating = $this->order_products()
            ->join('orders', 'order_products.order_id',
                '=', 'orders.id')
            ->selectRaw('AVG(orders.rating) as average_rating')
            ->value('average_rating');

        return $averageRating ?? 0;
    }
    //endregion
}
