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


  public function edit($id)
  {
    $location = Location::findOrFail($id);
    return $location;
  }

  public function locationsList(Request $request)
  {
    $locations = Location::select('locations.*', 'complex.complex_name')->join('complex', 'complex.id', '=', 'locations.id_complex');
    return DataTables::of($locations)
    ->addColumn('action', function($locations) {
      $button=" ";
      if ($locations->status == 1) {
        $button = '<a href="/locations/status/'.$locations->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $button = '<a href="/locations/status/'.$locations->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $button.'  <a onclick="editLocation('. $locations->id .')" class="btn btn-md btn-info"><i class="fa fa-edit text-light"></i></a>';
    })->editColumn('status',function($locations){
      return $locations->status == 1 ? "Activo":"Inactivo";
    })->make(true);
  }

  public function update(Request $request, $id)
  {
      $location = Location::findOrFail($id);
      $location->update($request->all());
      return $location;
  }

  public function status($id, $status)
    {
      $location = Location::findOrFail($id);
      if ($location == null) {
      return redirect('configurations');
      }else {
      $location->update(["status"=>$status]);
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Cambio de estado', 'Se cambio el estado exitosamente')]);
    }
    }

}
