<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';

    protected $fillable = [
      'budget', 'budget_adition', 'budget_code', 'budget_begin_date', 'budget_finish_date'
    ];

    public $timestamps = false;
}