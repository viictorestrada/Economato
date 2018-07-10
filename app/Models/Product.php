<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'product_code', 'id_product_type', 'product_name', 'presentation_id', 'id_measure_unit', 'status'
    ];

    public static function measureUnit($id)
    {
      $product = Product::where('id', $id)->get()->first();
      $measureUnit = $product->id_measure_unit;
      return [$product, $measureUnit];
    }

    public $timestamps = false;

}
