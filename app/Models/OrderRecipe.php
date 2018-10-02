<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderRecipe extends Model
{

  protected $table = 'orders_recipes';
  protected $fillable = ['recipe_id', 'product_id', 'order_id' , 'quantity', 'package_number','quantityAndPack'];

  public $timestamps = false;

}


?>
