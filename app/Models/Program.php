<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
  protected $table = 'programs';

  protected $fillable = ['location_id','program_name', 'program_version', 'program_description', 'status'];

  public $timestamps = false;
}
