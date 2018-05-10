<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComplexController extends Controller
{

    public function store(Request $request)
    {
      $this->validate($request, [
        'id_region' => 'required',
        'complex_name' => 'required|string|max:200|unique:complex'
      ]);
      Complex::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(Complex $complex)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'id_region' => 'required',
        'complex_name' => 'required|string|max:200', Rule::unique('complex')->ignore($this->id, 'id')
      ]);
      $complex = Complex::find($id);
      $complex->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
