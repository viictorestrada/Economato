<?php

namespace App\Http\Controllers;

use App\Models\LearningResult;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class LearningResultController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'id_competence' => 'required',
      'learning_result' => 'required|string|max:255|unique:learning_results',
    ]);
    LearningResult::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit($id)
  {
    //
  }


  public function learningResultsList(Request $request)
  {
    $learning_results = LearningResult::select('learning_results.*','competences.competence_name')->join('competences', 'competences.id', '=', 'learning_results.id_competence')->get();
    return DataTables::of($learning_results)
    ->addColumn('action', function($id) {
      $button=" ";
      return $button.'  <a href="/learning_results/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request,  $id)
  {
    $this->validate($request, [
      'id_competence' => 'required',
      'learning_result' => 'required|string|max:255', Rule::unique('learning_results')->ignore($this->id, 'id')
    ]);
    $learning_result = LearningResult::find($id);
    $learning_result->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
