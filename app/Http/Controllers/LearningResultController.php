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

    $rules = [
      'id_competence' => 'required',
      'learning_result' => 'required|string|max:255|unique:learning_results'
    ];

    $messages = [
      'id_competence.required' => 'El campo Competencia es obligatorio.',
      'learning_result.required' => 'El campo Resultado de Aprendizaje es obligatorio.',
      'learning_result.max' => 'El campo Resultado de Aprendizaje debe contener máximo 255 caracteres.',
      'learning_result.unique' => 'El Resultado de Aprendizaje ya existe.'
    ];

    $this->validate($request,$rules, $messages);
    LearningResult::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit($id)
  {
    $learning_result = LearningResult::findOrFail($id);
    return $learning_result;
  }


  public function learningResultsList(Request $request)
  {
    $learning_results = LearningResult::select('learning_results.*','competences.competence_name')->join('competences', 'competences.id', '=', 'learning_results.id_competence')->get();
    return DataTables::of($learning_results)
    ->addColumn('action', function($learning_result) {
      $button=" ";
      return $button.'  <a onclick="editLearningResult('. $learning_result->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request, $id)
  {
    $learning_result = LearningResult::findOrFail($id);
    $learning_result->update($request->all());
    return $learning_result;
  }
}
