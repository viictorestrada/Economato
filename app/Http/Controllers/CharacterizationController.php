<?php

namespace App\Http\Controllers;

use App\Models\Characterization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CharacterizationController extends Controller
{

    public function store(Request $request)
    {
      $this->validate($request, [
        'characterization_name' => 'required|max:100|unique:characterizations'
      ]);
      Characterization::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Characterization $characterization)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'characterization_name' => 'required|string|max:45', Rule::unique('characterizations')->ignore($this->id, 'id')
      ]);
      $characterization = Characterization::find($id);
      $characterization->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
