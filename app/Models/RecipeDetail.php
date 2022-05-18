<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'drug_id',
        'signa_id',
        'qty',
    ];

    public function drug() {
        return $this->belongsTo(Drug::class, 'drug_id', 'obatalkes_id');
    }
    public function signa() {
        return $this->belongsTo(Signa::class, 'signa_id', 'signa_id');
    }
}
