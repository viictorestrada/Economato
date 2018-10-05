<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tax extends Model
{
    protected $table = 'taxes';

    protected $fillable = ['tax'];

    public $timestamps = false;
}
