<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $table = 'locations';

  protected $fillable = ['id_complex', 'location_name', 'id_program'];

  public $timestamps = false;
}
