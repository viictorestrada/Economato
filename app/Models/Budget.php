<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';

    protected $fillable = [
      'aditional_budget_id', 'budget', 'budget_code', 'budget_begin_date', 'budget_finish_date', 'status'
    ];

    public $timestamps = false;
}
