<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AditionalBudget extends Model
{
    protected $table = 'aditional_budget';

    protected $fillable = ['aditional_budget', 'aditional_budget_code'];

    public $timestamps = false;
}
