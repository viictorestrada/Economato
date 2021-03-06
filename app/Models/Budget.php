<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';

    protected $fillable = [
      'initial_budget' , 'budget', 'budget_code', 'budget_begin_date', 'budget_finish_date', 'status'
    ];

    public $timestamps = false;
}
