<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegionController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'region_name' => 'required|string|max:45|unique:regions'
    ]);
    Region::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Region $region)
  {
    //
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'region_name' => 'required|string|max:45', Rule::unique('regions')->ignore($this->id, 'id')
    ]);
    $region = Region::find($id);
    $region->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
