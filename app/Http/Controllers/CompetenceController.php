<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompetenceController extends Controller
{

    public function store(Request $request)
    {
      $this->validate($request, [
        'id_program' => 'required',
        'competence_name' => 'required|string|max:255|unique:competences'
      ]);
      Competence::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Competence $competence)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'id_region' => 'required',
        'competence_name' => 'required|string|max:255', Rule::unique('competences')->ignore($this->id, 'id')
      ]);
      $competences = Competence::find($id);
      $competences->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
