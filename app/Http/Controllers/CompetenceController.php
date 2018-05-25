<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class CompetenceController extends Controller
{

    public function store(Request $request)
    {

      $rules = [
        'id_region' => 'required',
        'competence_name' => 'required|string|max:255|unique:competences'
      ];

      $messages = [
        'id_region.required' => 'El campo Regional es obligatorio.',
        'competence_name.unique' => 'El campo Competencia ya existe.',
        'competence_name.required' => 'El campo Competencia es obligatorio.',
        'competence_name.max' => 'El campo Competencia debe contener máximo 255 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      Competence::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Competence $competence)
    {
        //
    }


    public function competencesList(Request $request)
    {
      $competences = Competence::select('competences.*','programs.program_name')->join('programs', 'programs.id', '=', 'competences.id_program')->get();
      return DataTables::of($competences)
      ->addColumn('action', function($id) {
        $button=" ";
        return $button.'  <a href="/competences/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {

      $rules = [
        'id_region' => 'required',
        'competence_name' => 'required|string|max:255', Rule::unique('competences')->ignore($this->id, 'id')
      ];

      $messages = [
        'id_region.required' => 'El campo Regional es obligatorio.',
        'competence_name.required' => 'El campo Competencia es obligatorio.',
        'competence_name.max' => 'El campo Competencia debe contener máximo 255 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      $competences = Competence::find($id);
      $competences->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
