<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
  protected $table = 'product_type';

  protected $fillable =['product_type_name', 'description'];

  public $timestamps = false;
}
