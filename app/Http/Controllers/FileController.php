<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Program;
use App\Models\Characterization;
use Illuminate\Http\Request;
use App\Http\Requests\saveFileRequest;
use App\Http\Requests\updateFileRequest;
use DataTables;

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

  public function store(saveFileRequest $request)
  {
    File::create($request->all());
    return redirect('files')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }

  public function filesList(Request $request)
  {
    $files = File::select('files.*', 'programs.program_name', 'characterizations.characterization_name')
    ->join('programs', 'programs.id', '=', 'files.program_id')
    ->join('characterizations', 'characterizations.id', '=', 'files.characterization_id')->get();
    return DataTables::of($files)
    ->addColumn('action', function($id) {
      $button=" ";
      if ($id->status == 1) {
        $button = '<a href="/files/status/'.$id->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/files/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.'  <a href="/files/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($id){
      return $id->status == 1 ? "Activo":"Inactivo";
    })
    ->make(true);
  }


  public function edit($id)
  {
    $file = File::find($id);
    $programs = Program::all();
    $characterizations = Characterization::all();
    return view('files.edit', compact('file', 'programs', 'characterizations'));
  }


  public function update(updateFileRequest $request,  $id)
  {
    $file = File::find($id);
    $file->update($request->all());
    return redirect('files')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }


  public function status($id, $status)
  {
    $file = File::find($id);
    if ($file == null) {
      alert()->autoclose(1500)->warning('Advertencia','No se encontraron datos!');
      return redirect('files');
    }else {
      $file->update(["status"=>$status]);
      return redirect('files')->with([swal()->autoclose(1500)->message('La ficha '.$file->file_number.' esta',' '.$file->status == 1 ? "Activo":"Inactivo".' ','success')]);
    }
  }

}
