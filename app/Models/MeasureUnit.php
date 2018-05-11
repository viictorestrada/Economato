<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureUnit extends Model
{
    protected $table = 'measure_unit';

    protected $fillable =['measure_name'];

    public $timestamps = false;
}
