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
      'region_name.unique' => "El campo Regional ya existe.",
      'region_name.max' => 'El campo Regional debe contener máximo 45 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    Region::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit($id)
  {
    $region = Region::findOrFail($id);
    return $region;
  }

  public function regionsList(Request $request)
  {
    $regions = Region::all();
    return DataTables::of($regions)
    ->addColumn('action', function($region) {
      $button = ' ';
      return $button.'<a onclick="editRegion('. $region->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }

  public function update(Request $request, $id)
  {
    $region = Region::findOrFail($id);
    $region->update($request->all());
    return $region;
  }


}
