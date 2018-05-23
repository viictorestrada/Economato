<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $table = 'presentations';

    protected $fillable = ['presentation'];

    public $timestamps = false;
}
