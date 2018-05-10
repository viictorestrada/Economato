<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['product_code', 'id_product_type', 'product_name', 'id_measure_unit', 'prensetation', 'quantity', 'due_date', 'unit_price', 'stock'];

    public $timestamps = false;
}
