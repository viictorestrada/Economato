<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['product_code', 'id_product_type', 'product_name', 'id_measure_unit', 'presentation_id', 'quantity', 'due_date', 'unit_price', 'taxes_id','unit_price_tax', 'stock', 'status'];

    public $timestamps = false;
}
