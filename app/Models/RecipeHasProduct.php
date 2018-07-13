<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeHasProduct extends Model
{
    protected $table = 'recipes_has_products';

    protected $fillable = [
        'recipe_id', 'product_id', 'quantity' , 'recipe_cost'
    ];

    public $timestamps = false;
}
