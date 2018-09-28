<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsHasContracts;
use App\Models\Contract;


class CronJobController extends Controller{

  public function updateProductsHasContracts(){
    $contractsData=Contract::where('contracts.status',1)
    ->where('products_has_contracts.status',1)
    ->join('products_has_contracts', 'contracts.id','=','products_has_contracts.contracts_id')
    ->select('products_has_contracts.id','contracts.finish_date','contracts.id')
    ->get();
    // dump($contractsData->pluck('finish_date')->first());
    // dd(date('Y-m-d'));
    if(date('Y-m-d')>$contractsData->pluck('finish_date')->first()){
      foreach($contractsData as $value){
      ProductsHasContracts::findOrfail($value->id)->update(['status'=>0]);
      dump($value->id);
    }
    }else{
      dump('no hay que actualizar');
    }

    dd($contractsData);
  }

}



?>
