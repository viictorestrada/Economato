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

  public function regionsList(Request $request)
  {
    $regions = Region::select('regions.*')->get();
    return DataTables::of($regions)
    ->addColumn('action', function($id) {
      $button = ' ';
      return $button.'<a href="/regions/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->make(true);
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
