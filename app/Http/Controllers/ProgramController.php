<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class ProgramController extends Controller
{

  public function store(Request $request)
  {
    $rules = [
      'program_name' => 'required|string|max:255|unique:programs',
      'program_version' => 'required|numeric|min:1',
      'program_description' => 'required|string'
    ];

    $messages = [
      'program_name.required' => 'El campo Nombre de programa es obligatorio.',
      'program_name.max' => 'El campo Nombre de programa debe contener máximo 255 caracteres.',
      'program_name.unique' => 'El Nombre del programa ya existe.',
      'program_version.required' => 'El campo Versión de programa es obligatorio.',
      'program_version.numeric' => 'El campo Versión del programa es estrictamente númerico.',
      'program_version.min' => 'El campo Versión del programa debe contener mínimo 1 caracter.',
      'program_description.required' => 'El campo Descripción es obligatorio.'
    ];


    $this->validate($request, $rules, $messages);
    Program::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }

  public function programsList()
  {
    $programs = Program::select('programs.*', 'locations.location_name')->join('locations', 'locations.id', '=', 'programs.locations_id')->get();
    return DataTables::of($programs)
    ->addColumn('action', function ($id) {
      $button = "";
      if ($id->status == 1) {
        $button = '<a href="/programs/status/'.$id->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/programs/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.'  <a href="/locations/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($id){
      return $id->status == 1 ? "Activo":"Inactivo";
    })->make(true);
  }


  public function edit(Program $program)
  {
    //
  }


  public function update(Request $request, Program $program)
  {

    $rules = [
      'program_name' => 'required|string|max:255', Rule::unique('programs')->ignore($this->id, 'id'),
      'program_version' => 'required|numeric|min:1',
      'program_description' => 'required|string'
    ];

    $messages = [
      'program_name.required' => 'El campo Nombre de programa es obligatorio.',
      'program_name.max' => 'El campo Nombre de programa debe contener máximo 255 caracteres.',
      'program_version.required' => 'El campo Versión de programa es obligatorio.',
      'program_version.numeric' => 'El campo Versión del programa es estrictamente númerico.',
      'program_version.min' => 'El campo Versión del programa debe contener mínimo 1.',
      'program_description.required' => 'El campo Descripción es obligatorio.'
    ];

    $this->validate($request, $rules, $messages);
    $program = Program::find($id);
    $program->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
