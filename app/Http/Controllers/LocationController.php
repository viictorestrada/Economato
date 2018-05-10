<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

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
