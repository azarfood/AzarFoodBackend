<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 * @property mixed $type
 * @property mixed $date
 * @property mixed $amount
 */
class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [];

    //region Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //endregion
}
