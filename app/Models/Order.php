<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "meal",
        "rating"
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
}
