<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodTemplate extends Model
{
    use HasFactory;


    //region Relations
    public function foods(): HasMany
    {
        return $this->hasMany(Food::class, 'template_id');
    }

    //endregion
}
