<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsHasContracts;
use App\Models\Contract;
use App\Models\Budget;
use App\Models\File;

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
    $budgetData=Budget::where('status',1)
    ->where('aditional_budget',1);
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
