<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Budget;
use App\Models\AditionalBudget;

class UpdateBudget extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:budget';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizando presupuesto';

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
      $this->info("tarea de presupuesto ejecutada");
    }
}
