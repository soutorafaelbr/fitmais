<?php

namespace App\Models\Ingredients;

use App\Models\Meals\Meal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ingredient_type_id',
        'measured_by',
    ];

    public function meals(): belongsToMany
    {
        return $this->belongsToMany(Meal::class);
    }
}
