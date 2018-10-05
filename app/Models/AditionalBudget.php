<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AditionalBudget extends Model
{
    protected $table = 'aditional_budget';

    protected $fillable = ['budget_id', 'aditional_budget', 'aditional_budget_code' , 'aditional_finish_date'];

    public $timestamps = false;
}
