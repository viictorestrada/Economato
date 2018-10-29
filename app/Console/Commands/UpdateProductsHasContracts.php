<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contract;
use App\Models\ProductsHasContracts;



class UpdateProductsHasContracts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:productsHasContracts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar productos del contrato cuando la fecha del contrato termine';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
      $this->info("tarea de acttualizar estado de productos en el contrato ejecutada");
    }
}
