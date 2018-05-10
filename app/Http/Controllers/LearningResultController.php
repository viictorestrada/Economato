<?php

namespace App\Http\Controllers;

use App\Models\LearningResult;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LearningResult extends Controller
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


  public function edit(file $learning_result)
  {
    //
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
