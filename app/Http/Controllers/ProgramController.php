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
      'location_id' => 'required',
      'program_name' => 'required|string|max:255|unique:programs',
      'program_version' => 'required|numeric|min:1',
      'program_description' => 'required|string'
    ];

    $messages = [
      'location_id.required' => 'El campo Centro de formación es obligatorio',
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

  public function programsList(Request $request)
  {
    $programs = Program::select('programs.*', 'locations.location_name')->join('locations', 'locations.id', '=', 'programs.location_id')->get();
    return DataTables::of($programs)
    ->addColumn('action', function ($programs) {
      $button = " ";
      if ($programs->status == 1) {
        $button = '<a href="/programs/status/'.$programs->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/programs/status/'.$programs->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.'  <a onclick="editProgram('. $programs->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($programs){
      return $programs->status == 1 ? "Activo":"Inactivo";
    })->make(true);
  }


  public function edit($id)
  {
    $program = Program::find($id);
    return $program;
  }


  public function update(Request $request, $id)
  {
    $program = Program::find($id);
    $program->update($request->all());
    return $program;
  }

  public function status($id, $status)
    {
      $program = Program::find($id);
      if ($program == null) {
      return redirect('configurations');
      }else {
      $program->update(["status"=>$status]);
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Cambio de estado', 'Se cambio el estado exitosamente')]);
      }
    }

}
