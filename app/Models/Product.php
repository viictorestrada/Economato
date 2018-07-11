<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MeasureUnit;

class Product extends Model
{
  protected $table = 'products';
    protected $fillable = [
      'product_code', 'id_product_type', 'product_name', 'presentation_id', 'id_measure_unit', 'status'
    ];

    public static function measureUnit($id)
    {
      $product = MeasureUnit::select('measure_unit.measure_name')
      ->join('products', 'products.id_measure_unit', '=', 'measure_unit.id')->get()->first();
      $measureUnit = $product->measure_name;
      return $measureUnit;
    }

    public $timestamps = false;

}
