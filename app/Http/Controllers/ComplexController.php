<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComplexController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'id_region' => 'required',
        'complex_name' => 'required|string|max:200|unique:complex'
      ];

      $messages = [
        'id_region.required' => 'El Campo región es obligatorio.',
        'complex_name.unique' => 'El campo Complejo ya existe.',
        'complex_name.required' => 'El campo Complejo es obligatorio',
        'complex_name.max' => 'El campo Completo debe contener máximo 200 caracteres.'
      ];


      $this->validate($request, $rules, $messages);
      Complex::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Complex $complex)
    {
        //
    }


    public function update(Request $request, $id)
    {

      $rules = [
        'id_region' => 'required',
        'complex_name' => 'required|string|max:200', Rule::unique('complex')->ignore($this->id, 'id')
      ];

      $messages = [
        'id_region.required' => 'El Campo región es obligatorio.',
        'complex_name.required' => 'El campo Complejo es obligatorio',
        'complex_name.max' => 'El campo Completo debe contener máximo 200 caracteres.'
      ];


      $this->validate($request, $rules, $messages);
      $complex = Complex::find($id);
      $complex->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
