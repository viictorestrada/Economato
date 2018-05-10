<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FileController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'program_id' => 'required',
      'characterization_id' => 'required',
      'file_number' => 'required|string|max:45|unique:file_number',
      'file_route' => 'required|integer',
      'apprentices' => 'required|integer',
    ]);
    File::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(file $file)
  {
    //
  }


  public function update(Request $request,  $id)
  {
    $this->validate($request, [
      'program_id' => 'required',
      'characterization_id' => 'required',
      'file_number' => 'required|string|max:45', Rule::unique('files')->ignore($this->id, 'id'),
      'file_route' => 'required|integer',
      'apprentices' => 'required|integer',
    ]);
    $file = File::find($id);
    $file->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
