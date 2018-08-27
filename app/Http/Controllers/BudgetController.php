<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\AditionalBudget;
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
      $budgetCode=$request->input('budget_id');
      $budgetA=$request->input('aditional_budget');
      AditionalBudget::create($request->all());
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
      Budget::create([
        'initial_budget'=>$request['budget'],
        'budget'=>$request['budget'],
        'budget_code'=>$request['budget_code'],
        'budget_begin_date'=>$request['budget_begin_date'],
        'budget_finish_date'=>$request['budget_finish_date']
      ]);
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Registro Existoso', 'Se agrego un nuevo registro')]);
    }


    public function budgetsList(Budget $budget)
    {
      $budgets =  Budget::select('budget.*')->get();
      return DataTables::of($budgets)
      ->addColumn('action', function ($budgets) {
        $button = " ";
        if($budgets->status == 1)
        {
          $button = '<a href="/budgets/status/'.$budgets->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>  ';
        }else{
          $button = '<a href="/budgets/status/'.$budgets->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>  ';
        }
        return $button.'<a href="/budgets/'.$budgets->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>  '.
        '<a onclick="aditionalBudget('.$budgets->id.')" class="btn btn-md btn-info text-light" data-toggle="tooltip" title="Adicionar Presupuesto"><i class="fa fa-plus-circle"></i></a>';
      })->editColumn('status', function ($budgets) {
        return $budgets->status == 1 ? "Activo":"Inactivo";
      })
      ->make(true);
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
