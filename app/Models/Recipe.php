<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $table = 'recipes';

  protected $fillable =['recipe_name', 'recipes_cost','status'];

  public $timestamps = false;
}
