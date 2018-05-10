<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{


  public function store(Request $request)
  {
    $this->validate($request, [
      'role' => 'required|string|max:45|unique:roles'
    ]);
    Role::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Rol $rol)
  {
    //
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'role' => 'required|max:45|string', Rule::unique('roles')->ignore($this->id, 'id')
    ]);
    $role = Role::find($id);
    $role->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
