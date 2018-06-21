<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class StorageController extends Controller
{

  public function store(Request $request)
  {
    $rules = [
      'storage_name' => 'required|string|max:45|unique:storages',
      'storage_location' => 'required|string|max:100'
    ];

    $messages = [
      'storage_name.require' => 'El campo Bodega debe existir.',
      'storage_name.max' => 'El campo Bodega debe contener máximo 45 caracteres.',
      'storage_name.unique' => 'La Bodega ya existe.',
      'storage_location.required' => 'El campo Ubicación es obligatorio.',
      'storage_location.max' => 'El campo Ubicación debe contener máximo 100 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    Storage::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitosa', 'Se ha agregado un nuevo registro')]);
  }

  public function storagesList(Request $request)
  {
    $storages = Storage::all();
    return DataTables::of($storages)
    ->addColumn('action', function ($storages) {
      $button = " ";
      return $button.'<a onclick="editStorage('.$storages->id.')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })
    ->make(true);
  }

  public function edit($id)
  {
    $storages = Storage::find($id);
    return $storages;
  }

  public function update(Request $request, $id)
  {

    // $rules = [
    //   'storage_name' => 'required|string|max:45', Rule::unique('storages')->ignore($this->id, 'id'),
    //   'storage_location' => 'required|string|max:100'
    // ];

    // $messages = [
    //   'storage_name.require' => 'El campo Bodega debe existir.',
    //   'storage_name.max' => 'El campo Bodega debe contener máximo 45 caracteres.',
    //   'storage_location.required' => 'El campo Ubicación es obligatorio.',
    //   'storage_location.max' => 'El campo Ubicación debe contener máximo 100 caracteres.'
    // ];

    // $this->validate($request, $rules, $messages);
    $storages = Storage::find($id);
    $storages->update($request->all());
    return $storages;
    //redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
