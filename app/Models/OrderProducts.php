<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProducts extends Model
{
    use HasFactory;

    protected $table = 'order_products';
    protected $fillable = [
        'food_id',
        'count'
    ];

    //region Relations
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    //endregion
}
