<?php

namespace App\Http\Controllers;

use App\Models\MeasureUnit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MeasureUnitController extends Controller
{

    public function store(Request $request)
    {
      $this->validate($request, [
        'measure_name' => 'required|string|max:45|unique:measure_name',
      ]);
      MeasureUnit::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(MeasureUnit $measure)
    {
        //
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'measure_name' => 'required|string|max:45|unique:measure_name', Rule::unique('measure_unit')->ignore($this->id, 'id')
      ]);
      $measure = MeasureUnit::find($id);
      $measure->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
