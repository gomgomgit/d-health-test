<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer',
        'phone',
        'date',
        'is_concoction',
        'concoction_name',
    ];

    public function recipeDetails() {
        return $this->hasMany(RecipeDetail::class);
    }
}
