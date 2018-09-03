<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productionOrders extends Model
{
    protected $table = 'center_production_orders';
    protected $fillable = [
        'characterizations_id', 'description' , 'pax' , 'user_name' , 'order_date' , 'status', 'title'
    ];
    public $timestamps = true;

}
