<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class PresentationController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'presentation' => 'required|string|max:50|unique:presentations',
      ];

      $messages = [
        'presentation.required' => 'El campo Presentación es obligatorio.',
        'presentation.max' => 'El campo Presentación debe contener máximo 50 caracteres.',
        'presentation.unique' => 'El campo Presentación ya existe.'
      ];

      $this->validate($request, $rules, $messages);
      Presentation::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }


    public function edit($id)
    {
        //
    }


    public function presentationsList(Request $request)
    {
      $presentations = Presentation::select('presentations.*')->get();
      return DataTables::of($presentations)
      ->addColumn('action', function($id) {
        $button=" ";
        return $button.'  <a href="/presentations/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {
      $rules = [
        'presentation' => 'required|string|max:50', Rule::unique('presentations')->ignore($this->id, 'id')
      ];

      $messages = [
        'presentation.required' => 'El campo Presentación es obligatorio.',
        'presentation.max' => 'El campo Presentación debe contener máximo 50 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      $presentations = Presentation::find($id);
      $presentations->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
