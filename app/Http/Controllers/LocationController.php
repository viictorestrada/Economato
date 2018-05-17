<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class LocationController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'id_complex' => 'required',
      'location_name' => 'required|string|max:45|unique:locations',
      'id_program' => 'required'
    ]);
    Location::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Location $location)
  {
    //
  }

  public function locationsList(Request $request)
  {
    $locations = Location::select('locations.*', 'complex.complex_name', 'programs.program_name')->join('complex', 'complex.id', '=', 'locations.id_complex')->join('programs', 'programs.id', '=', 'locations.id_program')->get();
    return DataTables::of($locations)
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
    $this->validate($request, [
      'id_complex' => 'required',
      'location_name' => 'required|string|max:45', Rule::unique('locations')->ignore($this->id, 'id'),
      'id_program' => 'required'
    ]);
    $location = Location::find($id);
    $location->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
