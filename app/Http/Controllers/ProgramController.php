<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'program_name' => 'required|string|max:255|unique:programs',
      'program_version' => 'required|numeric|min:1',
      'program_description' => 'required|string'
    ]);
    Program::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Program $program)
  {
    //
  }


  public function update(Request $request, Program $program)
  {
    $this->validate($request, [
      'program_name' => 'required|string|max:255', Rule::unique('programs')->ignore($this->id, 'id'),
      'program_version' => 'required|numeric|min:1',
      'program_description' => 'required|string'
    ]);
    $program = Program::find($id);
    $program->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
