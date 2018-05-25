<?php

namespace App\Http\Controllers;

use App\Models\Characterization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CharacterizationController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'characterization_name' => 'required|string|max:45|unique:characterizations',
      ];


      $messages = [
        'characterization_name.required' => 'El campo Caracterización es obligatorio.',
        'characterization_name.unique' => 'El campo Caracterización ya existe.',
        'characterization_name.max' => 'El campo Caracterización debe contener máximo 45 caracteres.'
      ];


      $this->validate($request, $rules, $messages);
      Characterization::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Characterization $characterization)
    {
        //
    }


    public function update(Request $request, $id)
    {

      $rules = [
        'characterization_name' => 'required|string|max:45', Rule::unique('characterizations')->ignore($this->id, 'id')
      ];


      $messages = [
        'characterization_name.required' => 'El campo Caracterización es obligatorio.',
        'characterization_name.max' => 'El campo Caracterización debe contener máximo 45 caracteres.'
      ];


      $this->validate($request, $rules, $messages);
      $characterization = Characterization::find($id);
      $characterization->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
