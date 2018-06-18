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
      $characterizations = Characterization::all();
      return DataTables::of($characterizations)
      ->addColumn('action', function ($characterizations) {
        $button = " ";

        if($characterizations->status == 1) {
          $button = '<a href="/characterizations/status/'.$characterizations->status.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
        }
        else {
          $button = '<a href="/characterizations/status/'.$characterizations->status.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a> ';
        }
        return $button.' <a onclick="editCharacterization('. $characterizations->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
      })->editColumn('status', function ($characterizations) {
        return $characterizations->status == 1 ? "Activo" : "Inactivo";
      })
      ->make(true);
    }


    public function edit($id)
    {
        $characterization = Characterization::find($id);
        return $characterization;
    }


    public function update(Request $request, $id)
    {
      $characterization = Characterization::find($id);
      $characterization->update($request->all());
      return $characterization;
    }

    public function status($id, $status)
    {
      $characterization = Characterization::find($id);
    if ($characterization == null) {
      return redirect('configurations')->with([swal()->autoclose(1500)->error('Oops!', 'Se ha generado un error!')]);
    }else {
      $characterization->update(["status"=>$status]);
      return redirect('configurations')->with([swal()->autoclose(1500)->message('La caracterización '.$characterization->characterization_name.' está', ''.$characterization->status == 1 ? "Activo":"Inactivo".'', 'success')]);
    }
    }

}
