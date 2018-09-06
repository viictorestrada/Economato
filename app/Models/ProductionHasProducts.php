<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionHasProducts extends Model
{
    protected $table = 'center_production_has_products';

    protected $fillable = ['center_production_orders_id' , 'products_id' , 'quantity'];

    public $timestamps = false;
}
