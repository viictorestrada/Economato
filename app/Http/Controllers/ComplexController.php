<?php

namespace App\Http\Controllers;

use App\Models\Complex;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

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

    public function complexList()
    {
      $complex = Complex::select('complex.*', 'regions.region_name')->join('regions', 'regions.id', '=', 'complex.id_region')->get();
      return DataTables::of($complex)
      ->addColumn('action', function ($complex) {
        $button = " ";
        return $button.'<button onclick="editComplex('.$complex->id.')" class="btn btn-md btn-outline-info"><i class="fa fa-edit"></i></button>';
      })
      ->make(true);
    }


    public function edit($id)
    {
        $complex = Complex::findOrFail($id);
        return $complex;
    }


    public function update(Request $request, $id)
    {

      // $rules = [
      //   'id_region' => 'required',
      //   'complex_name' => 'required|string|max:200', Rule::unique('complex')->ignore($this->id, 'id')
      // ];

      // $messages = [
      //   'id_region.required' => 'El Campo Región es obligatorio.',
      //   'complex_name.required' => 'El campo Complejo es obligatorio',
      //   'complex_name.max' => 'El campo Completo debe contener máximo 200 caracteres.'
      // ];

      // $this->validate($request, $rules, $messages);
      $complex = Complex::findOrFail($id);
      $complex->update($request->all());
       return $complex;
      //redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
