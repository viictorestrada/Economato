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
    $rules = [
      'id_complex' => 'required',
      'location_name' => 'required|string|max:45|unique:locations',
    ];

    $messages = [
      'location_name.required' => 'El campo Centro de formación es obligatorio.',
      'location_name.max' => 'El campo Centro de formacion debe contener máximo 45 caracteres.',
      'location_name.unique' => 'El campo Centro de formación ya existe.',
      'id_complex' => 'El campo Complejo es obligatorio.'
    ];

    $this->validate($request, $rules, $messages);

    Location::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Location $location)
  {
    //
  }

  public function locationsList(Request $request)
  {
    $locations = Location::select('locations.*', 'complex.complex_name')->join('complex', 'complex.id', '=', 'locations.id_complex');
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

    $rules = [
      'id_complex' => 'required',
      'location_name' => 'required|string|max:45', Rule::unique('locations')->ignore($this->id, 'id')
    ];

    $messages = [
      'location_name.required' => 'El campo Centro de formación es obligatorio.',
      'location_name.max' => 'El campo Centro de formacion debe contener máximo 45 caracteres.',
      'id_complex' => 'El campo Complejo es obligatorio.'
    ];

    $this->validate($request, $rules, $messages);
    $location = Location::find($id);
    $location->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
