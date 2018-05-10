<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{

  protected $table = 'storages';

  protected $fillable = ['storage_name', 'storage_location'];

  public $timestamps = false;

}
