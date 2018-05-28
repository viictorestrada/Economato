<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
      'provider_name', 'nit', 'phone', 'address', 'contact_name', 'contact_last_name'
    ];

    public $timestamps = false;
}
