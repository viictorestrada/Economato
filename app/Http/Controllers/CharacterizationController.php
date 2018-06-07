<?php

namespace App\Http\Controllers;

use App\Models\Characterization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class CharacterizationController extends Controller
{

    public function store(Request $request)
    {
      $rules = [
        'characterization_name' => 'required|string|max:100|unique:characterizations',
      ];


      $messages = [
        'characterization_name.required' => 'El campo Caracterización es obligatorio.',
        'characterization_name.unique' => 'La Caracterización ingresada ya existe.',
        'characterization_name.max' => 'El campo Caracterización debe contener máximo 100 caracteres.'
      ];


      $this->validate($request, $rules, $messages);
      Characterization::create($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
    }

    public function characterizationsList()
    {
      $characterizations = Characterization::select('characterizations.*')->get();
      return DataTables::of($characterizations)
      ->addColumn('action', function ($id) {
        $button = " ";
        if($id->status == 1) {
          $button.'<a href="/characterizations/status'.$id->status.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
        }
        else {
          $button.'<a href="/characterizations/status'.$id->status.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
        }
        return $button.' <a href="/characterizations/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->editColumn('status', function ($id) {
        return $id->status == 1 ? "Activo" : "Inactivo";
      })
      ->make(true);
    }


    public function edit(Characterization $characterization)
    {
        //
    }


    public function update(Request $request, $id)
    {

      $rules = [
        'characterization_name' => 'required|string|max:100', Rule::unique('characterizations')->ignore($this->id, 'id')
      ];

      $messages = [
        'characterization_name.required' => 'El campo Caracterización es obligatorio.',
        'characterization_name.max' => 'El campo Caracterización debe contener máximo 100 caracteres.'
      ];

      $this->validate($request, $rules, $messages);
      $characterization = Characterization::find($id);
      $characterization->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

    public function status()
    {
      $characterization = Characterization::find($id);
    if ($characterization == null) {
      alert()->autoclose(1000)->warning('Advertencia', 'No se encontraron datos!');
      return redirect('configurations');
    }else {
      $characterization->update(["status"=>$status]);
      return redirect('configurations')->with([swal()->autoclose(1500)->message('La caracterización '.$characterization->characterization_name.' esta', ''.$user->status == 1 ? "Activo":"Inactivo".'', 'success')]);
    }
    }

}
