<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ContractsHasBudget extends Model{

  protected $table='contracts_has_budget';

  protected $fillable =['contract_id', 'budget_id' , 'contractsBudget'];

    public $timestamps=false;

}

?>
