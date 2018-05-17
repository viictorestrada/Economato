<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Program;
use App\Models\Characterization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FileController extends Controller
{

  public function index()
  {
    return view('files.index');
  }

  public function create()
  {
    $programs = Program::all();
    $characterizations = Characterization::all();
    return view('files.create', compact('programs', 'characterizations'));
  }

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

  public function filesList(Request $request)
  {
    $files = File::select('files.*', 'programs.program_name', 'characterizations.characterization_name')
    ->join('programs', 'programs.id', '=', 'files.program_id')
    ->join('characterizations', 'characterizations.id', '=', 'files.characterization_id')->get();
  }


  public function edit($id)
  {
    $file = File::find($id);
    $programs = Program::pluck('program_name', 'id');
    $characterizations = Characterization::pluck('characterization_name', 'id');
    return view('files.create', compact('programs', 'characterizations'));
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

  public function status()
  {

  }

}
