<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
  protected $table = 'complex';

  protected $fillable =['id_region', 'complex_name'];

  public $timestamps = false;
}
