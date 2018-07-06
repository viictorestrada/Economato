<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'product_code', 'id_product_type', 'product_name', 'presentation_id', 'id_measure_unit', 'status'
    ];

    public $timestamps = false;
}
