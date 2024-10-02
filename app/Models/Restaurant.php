<?php

namespace App\Models;

use App\Enums\FoodCollection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $rating
 * @property mixed $banner_url
 * @property mixed $address
 * @property mixed $logo
 * @property mixed $foods
 */
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [];

    //region Relations
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class, 'restaurant_id');
    }
    //endregion

    //region Scopes
    public function scopeLike(Builder $query, $q): void
    {
        $query->whereLike(column: 'name', value: $q);
    }

    public function scopeHasFoodInCategory(Builder $query, $category): void
    {
        $query->whereHas('foods.template', function (Builder $food) use ($category) {
            $food->where('category', $category);
        });
    }

    public function scopeFilterByCollection(Builder $query, $collection): void
    {
        if ($collection == FoodCollection::Best) {
            $q = DB::table('restaurants')
                ->select('restaurants.id')
                ->join('foods', 'restaurants.id', '=', 'foods.restaurant_id')
                ->join('order_products', 'foods.id',
                    '=', 'order_products.product_id')
                ->join('orders', 'order_products.order_id',
                    '=', 'orders.id')
                ->groupBy('restaurants.id')
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
        $averageRating = $this->foods()
            ->join('order_products', 'foods.id',
                '=', 'order_products.product_id')
            ->join('orders', 'order_products.order_id',
                '=', 'orders.id')
            ->selectRaw('AVG(orders.rating) as average_rating')
            ->value('average_rating');

        return $averageRating ?? 0;
    }
    //endregion
}
