<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\AditionalBudget;
use Illuminate\Http\Request;
use DataTables;

class BudgetController extends Controller
{

  public function __construct()
  {
    $this->middleware(['auth', 'executive']);
  }

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
      AditionalBudget::create($request->all());
    }


    public function store(Request $request)
    {
      Budget::create($request->all());
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Registro Existoso', 'Se agrego un nuevo registro')]);
    }


    public function budgetsList(Budget $budget)
    {
      $budgets =  Budget::select('budget.*')->get();
      return DataTables::of($budgets)
      ->addColumn('action', function ($id) {
        $button = " ";
        return $button.'<a href="/budgets/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>  ';
      })
      ->make(true);
    }


    public function edit($budget)
    {
      $budget = Budget::find($budget);
      return view('budget.edit', compact('budget'));
    }


    public function update(Request $request, $budget)
    {
      $budget = Budget::find($budget);
      $budget->update($request->all());
      return redirect('budgets')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se actualizo el registro exitosamente!')]);
    }

}
