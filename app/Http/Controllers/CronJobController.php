<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsHasContracts;
use App\Models\Contract;
use App\Models\Budget;
use App\Models\File;
use App\Models\AditionalBudget;

class CronJobController extends Controller{



  public function updateProductsHasContracts(){
    $contractsData=Contract::where('contracts.status',1)
    ->where('products_has_contracts.status',1)
    ->where('finish_date' ,'<', date('Y-m-d'))
    ->join('products_has_contracts', 'contracts.id','=','products_has_contracts.contracts_id')
    ->select('products_has_contracts.id','contracts.finish_date')
    ->get();
    if(date('Y-m-d')>$contractsData->pluck('finish_date')->first()){
      foreach($contractsData as $value){
      ProductsHasContracts::findOrfail($value->id)->update(['status' => 0]);
    }
    Contract::where('status',1)->where('finish_date' ,'<', date('Y-m-d'))->update(['status'=>0]);
  }
  }

  public function updateBudget(){
    $aditionalBudgetDate=Budget::where('budget.status',1)
    ->where('aditional_budget.status',1)
    ->join('aditional_budget','budget.id','aditional_budget.budget_id')
    ->select('aditional_finish_date','aditional_budget.id')
    ->orderBy('aditional_finish_date', 'desc')->first();

    $budgetDate=Budget::where('budget.status',1)
    ->select('budget_finish_date','budget.id')
    ->orderBy('budget_finish_date', 'desc')->first();

    $aditionalUpdate=Budget::where('budget.status',1)
    ->where('aditional_budget.status',1)
    ->join('aditional_budget','budget.id','aditional_budget.budget_id')->get();

    $countAditions=count($aditionalBudgetDate);

    if($budgetDate != null){
    if($countAditions>0){
      if(date('Y-m-d') >= $aditionalBudgetDate->aditional_finish_date && $aditionalBudgetDate->aditional_finish_date > $budgetDate->budget_finish_date){
        $updateBudget=Budget::findOrfail($budgetDate->id)->update(['status'=>0]);
        foreach($aditionalUpdate as $value){
             $updateAditional=AditionalBudget::findOrfail($value->id)->update(['status'=>0]);
        }
      }elseif( date('Y-m-d')>=$budgetDate->budget_finish_date  &&  $budgetDate->budget_finish_date >$aditionalBudgetDate->aditional_finish_date ){
             $updateBudget=Budget::findOrfail($budgetDate->id)->update(['status'=>0]);
              foreach($aditionalUpdate as $value){
                  $updateAditional=AditionalBudget::findOrfail($value->id)->update(['status'=>0]);
              }
      }
    }elseif(date('Y-m-d') >= $budgetDate->budget_finish_date ){
        $updateBudget=Budget::findOrfail($budgetDate->id)->update(['status'=>0]);
    }
  }
  }

  public function updateFiles()
  {
    $filesData=File::where('status',1)->get();
    foreach($filesData as $key){
      if(date('Y-m-d')>$key['finish_date']){
        File::findOrfail($key['id'])->update(['status'=>0]);
      }
    }
  }
}





?>
