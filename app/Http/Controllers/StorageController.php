<?php

namespace App\Http\Controller;

use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Storage extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'storage_name' => 'required|string|max:45|unique:storages',
      'storage_location' => 'required|string|max:100'
    ]);
    Storage::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitosa', 'Se ha agregado un nuevo registro')]);
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'storage_name' => 'required|string|max:45', Rule::unique('storages')->ignore($this->id, 'id'),
      'storage_location' => 'required|string|max:100'
    ]);
    $storage = Storage::find($id);
    $storage->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }

}
