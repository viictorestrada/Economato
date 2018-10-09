<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\AditionalBudget;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;
use DB;

class BudgetController extends Controller
{

  protected $addAditionalBudget;

    public function index()
    {
      $budget = Budget::all();
      return view('budget.index', compact('budget'));
    }

    public function create()
    {
      return view('budget.create');
    }

    public function aditionalBudgetCreate(Request $request)
    {
      $budgetCode=$request['budget_id'];
      $budgetA=$request['aditional_budget'];
      // AditionalBudget::create($request->all());
      AditionalBudget::create([
        'budget_id' => $request['budget_id'],
        'aditional_budget' => $request['aditional_budget'],
        'aditional_budget_code' => $request['aditional_budget_code'],
        'aditional_finish_date' => $request['aditional_finish_date']
      ]);
      $budgetOrigin = Budget::select('budget')->get();
      $budgetOrigin = Budget::findOrFail($budgetCode);
      $budgetFinal=$budgetOrigin->budget;
      $budget = Budget::findOrFail($budgetCode);
      $budget->update(['budget'=>$budgetFinal+$budgetA]);
    }



    public function store(Request $request)
    {
      $this->validate($request, [
        'budget' => 'required|numeric|min:1',
        'budget_code' => 'required|string|max:45|unique:budget',
        'budget_begin_date' => 'required|date',
        'budget_finish_date' => 'required|date'
      ]);
        $validation=Budget::where('status',1)->get();
        if($validation->isEmpty()){
      Budget::create([
        'initial_budget' => $request['budget'],
        'budget'=>$request['budget'],
        'budget_code'=>$request['budget_code'],
        'budget_begin_date'=>$request['budget_begin_date'],
        'budget_finish_date'=>$request['budget_finish_date']
      ]);
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Registro Existoso', 'Se agrego un nuevo registro')]);
    }else  if(!$validation->isEmpty()){
      return redirect('budgets')->with([swal()->autoclose(1500)->warning('Verifique los presupuestos', 'Se encontro un presupuesto activo.')]);
    }
  }


    public function budgetsList(Budget $budget)
    {
      $budgets =  Budget::select('budget.*')->get();
      // dump(date('y-m-d'));
      // dd($budgets);
      return DataTables::of($budgets)
      ->addColumn('action', function ($budgets) {
        $button = " ";
        if($budgets->status == 1 && date('Y-m-d')<$budgets->budget_finish_date)
        {
          $button = '<a href="/budgets/status/'.$budgets->id.'/0" class="btn btn-md btn-outline-danger"><i class="fa fa-ban"></i></a>  ';
        }else if(date('Y-m-d')<$budgets->budget_finish_date) {
          $button = '<a href="/budgets/status/'.$budgets->id.'/1" class="btn btn-md btn-outline-success"><i class="fa fa-check-circle"></i></a>  ';
        }
        if(date('Y-m-d')<$budgets->budget_finish_date){
        return $button.'<a href="/budgets/'.$budgets->id.'/edit" class="btn btn-md btn-outline-info"><i class="fa fa-edit"></i></a>  '.
        '<button onclick="aditionalBudget('.$budgets->id.')" class="btn btn-md btn-outline-info" data-toggle="tooltip" title="Adicionar Presupuesto">
        <i class="fa fa-plus-circle"></i></button>
        <a href="/budgets/aditions/'.$budgets->id.'" class="btn btn-outline-danger" data-togle="tooltip" title="Descargar adiciones." style="text-decoration : none;"><i class="far fa-file-pdf "></i></a>';

      } else if(date('Y-m-d')>$budgets->budget_finish_date){
         return $button.'<button class="btn btn-outline-info">Presupuesto Finalizado</button>';
        }
      })->editColumn('status', function ($budgets) {
        return $budgets->status == 1 ? "Activo":"Inactivo";

      })->editColumn('budget', function($budgets){
        return number_format($budgets->budget);
      })->editColumn('initial_budget', function($budgets){
        return number_format($budgets->initial_budget);
      })
      ->make(true);
      // if(date('Y-m-d')<$budgets->budget_finish_date){
      //   BudgetController::status($budgets->id,0);
      // }

    }


    public function validationBudget($value){
      // $contracts_price=0;
      $budget=Budget::wherestatus(1)->value('initial_budget');
      $contract_price=Contract::wherestatus(1)->selectRaw('sum(contract_price) as acumContractPrice')->first();
      $actuallyBudget=($budget-$contract_price->acumContractPrice);
      $array=array();
    if($budget==null){
      $array[] = array('status' => 'null' , 'data' =>$actuallyBudget);
    }else if($value>$actuallyBudget && $budget!=null){
       $array[] = array('status' => 'false' , 'data' =>$actuallyBudget);
    }else if($value<=$actuallyBudget && $budget!=null){
     $array[] = array('status' => 'true', 'data' => $actuallyBudget);
    }
    return $array;
  }

    public function edit($budget)
    {
      $budget = Budget::findOrFail($budget);
      return view('budget.edit', compact('budget'));
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'budget' => 'required|numeric|min:1',
        'budget_code' => 'required|string|max:45',
        'budget_begin_date' => 'required|date',
        'budget_finish_date' => 'required|date'
      ]);
      $budget = Budget::findOrFail($id);
      $budget->update($request->all());
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se actualizo el registro exitosamente!')]);
    }

    public function status($id, $status)
    {
      $budget = Budget::findOrFail($id);
      $budget->update(['status'=>$status]);
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Cambio de estado!', 'El estado se actualizo correctamente')]);
    }

}
