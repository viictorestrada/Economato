<?php

namespace App\Http\Controllers;

use App\Models\MeasureUnit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class MeasureUnitController extends Controller
{

    public function store(Request $request)
    {

      $rules = [
        'measure_name' => 'required|string|max:45|unique:measure_unit'
      ];

      $messages = [
        'measure_name.required' => 'El campo Presentación es obligatorio.',
        'measure_name.max' => 'El campo Presentación debe contener máximo 45 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      MeasureUnit::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit(MeasureUnit $measure)
    {
        //
    }


    public function measuresList(Request $request)
    {
      $measures = MeasureUnit::select('measure_unit.*')->get();
      return DataTables::of($measures)
      ->addColumn('action', function($id) {
        $button=" ";
        return $button.'  <a href="/measures/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {
      $rules = [
        'measure_name' => 'required|string|max:45', Rule::unique('measure_unit')->ignore($this->id, 'id')
      ];

      $messages = [
        'measure_name.required' => 'El campo Presentación es obligatorio.',
        'measure_name.max' => 'El campo Presentación debe contener máximo 45 caracteres.',
      ];

      $this->validate($request, $rules, $messages);
      $measure = MeasureUnit::find($id);
      $measure->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
