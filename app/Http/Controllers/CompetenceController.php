<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class CompetenceController extends Controller
{

    public function store(Request $request)
    {

      $rules = [
        'id_program' => 'required',
        'competence_name' => 'required|string|max:255|unique:competences'
      ];

      $messages = [
        'id_program.required' => 'El campo Regional es obligatorio.',
        'competence_name.unique' => 'La Competencia ya existe.',
        'competence_name.required' => 'El campo Competencia es obligatorio.',
        'competence_name.max' => 'El campo Competencia debe contener máximo 255 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      Competence::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit($id)
    {
      $competence = Competence::findOrFail($id);
      return $competence;
    }


    public function competencesList(Request $request)
    {
      $competence = Competence::select('competences.*','programs.program_name')->join('programs', 'programs.id', '=', 'competences.id_program')->get();
      return DataTables::of($competence)
      ->addColumn('action', function($competences) {
        $button=" ";
        return $button.'  <a onclick="editCompetence('. $competences->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {
      $competence = Competence::findOrFail($id);
      $competence->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
