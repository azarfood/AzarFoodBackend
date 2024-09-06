<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
