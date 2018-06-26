<?php
namespace App\Procedures;

use App\Http\Controllers\BudgetController;
use DB;

class AditionalBudgetProcedure
{

  public function getAditionalBudget($budget_id,$aditional,$budget_code)
  {
    return \DB::select('CALL SP_aditionalBudget ?, ?, ?)', array($budget_id,$aditional,$budget_code));
  }

}
