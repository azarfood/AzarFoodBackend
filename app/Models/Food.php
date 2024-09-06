<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->hasMany(OrderProducts::class, 'food_id');
    }
    //endregion
}
