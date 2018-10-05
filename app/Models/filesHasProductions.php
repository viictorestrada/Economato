<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class filesHasProductions extends Model
{
    protected $table = "characterizations_has_center_production_orders";
    
    protected $fillable = [
        "center_production_orders_id", "files_id"
    ];

    public $timestamps = false;
}
