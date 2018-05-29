<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characterization extends Model
{
    protected $table = 'characterizations';

    protected $fillable =['characterization_name', 'status'];

    public $timestamps = false;
}
