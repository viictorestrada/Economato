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
      $this->validate($request, [
        'presentation' => 'required|string|max:50|unique:presentation',
      ]);
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
        return $button.'<a href="/presentations/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
      })->make(true);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'presentation' => 'required|string|max:50|unique:presentation', Rule::unique('presentations')->ignore($this->id, 'id')
      ]);
      $presentations = Presentation::find($id);
      $presentations->update($request->all());
      return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
    }

}
