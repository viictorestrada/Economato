<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class RegionController extends Controller
{

  public function store(Request $request)
  {
    $rules = [
      'region_name' => 'required|string|max:45|unique:regions'
    ];

    $messages = [
      'region_name.required' => 'El campo Regional es obligatorio.',
      'region_name,unique' => "El campo Regional ya existe.",
      'region_name.max' => 'El campo Regional debe contener máximo 45 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    Region::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Region $region)
  {
    //
  }

  public function regionsList(Request $request)
  {
    $regions = Region::select('regions.*')->get();
    return DataTables::of($regions)
    ->addColumn('action', function($id) {
      $button = ' ';
      return $button.'<a href="/regions/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function locationsList(Request $request)
  {
    $programs = Program::select('programs.*')->get();
    return DataTables::of($programs)
    ->addColumn('action', function($id) {
      $button=" ";
      if ($id->status == 1) {
        $button = '<a href="/locations/status/'.$id->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/locations/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.'  <a href="/locations/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($id){
      return $id->status == 1 ? "Activo":"Inactivo";
    })->make(true);
  }


  public function update(Request $request, $id)
  {

    $rules = [
      'region_name' => 'required|string|max:45', Rule::unique('regions')->ignore($this->id, 'id')
    ];

    $messages = [
      'region_name.required' => 'El campo Regional es obligatorio.',
      'region_name.max' => 'El campo Regional debe contener máximo 45 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    $region = Region::find($id);
    $region->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
